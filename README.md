# PHP Race Condition Example

This repository demonstrates a simple race condition in PHP.  The `bug.php` file shows the problematic code where incrementing a counter is not thread-safe.  The solution, presented in `bugSolution.php`, illustrates how to resolve this issue using a locking mechanism.

## Problem

In a multi-threaded or multi-process environment, concurrent access to shared resources (like counters) can lead to unexpected results.  This code example showcases a scenario where two simultaneous requests attempting to increment the same counter can result in incorrect final values.