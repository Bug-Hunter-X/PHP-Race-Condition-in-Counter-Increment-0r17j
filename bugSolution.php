This solution uses a file lock to ensure that only one process can access and modify the `counter.txt` file at a time.  By acquiring the lock before incrementing the counter and releasing it afterward, we prevent race conditions.

```php
<?php
$file = 'counter.txt';
$counter = 0;

if (file_exists($file)) {
    $counter = (int)file_get_contents($file);
}

// Acquire the lock
$fp = fopen($file, 'w+');
if (flock($fp, LOCK_EX)) {
    $counter++;
    ftruncate($fp, 0); // Reset file pointer
    fwrite($fp, $counter);
    flock($fp, LOCK_UN);
} else {
    echo "Could not acquire lock.\n";
}
fclose($fp);
echo "Counter value: " . $counter;
?>
```
This version is thread-safe because it uses locking mechanism to guarantee that only one process modifies the shared resource at a time.