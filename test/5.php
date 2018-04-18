<?php

$a = 123;
$b = 456;
echo 'before swap: $a = ' . $a . ' $b = ' . $b . PHP_EOL;
pm_swap($a,$b);
echo 'after swap: $a = ' . $a . ' $b = ' . $b . PHP_EOL;

// 如果直接输入常量，会导致类型检测通不过，触发php error。
//pm_swap(10,20);
