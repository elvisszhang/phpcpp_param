<?php
echo PHP_EOL . '-----TEST pm_factorial()-----' . PHP_EOL;
var_dump( pm_factorial() );

echo PHP_EOL . '-----TEST pm_factorial(\'abc\')-----' . PHP_EOL;
var_dump( pm_factorial('abc','def') );

echo PHP_EOL . '-----TEST pm_factorial(\'5\')-----' . PHP_EOL;
var_dump( pm_factorial('5') );

echo PHP_EOL . '-----TEST pm_factorial(0)-----' . PHP_EOL;
var_dump( pm_factorial(0) );


echo PHP_EOL . '-----TEST pm_factorial(10)-----' . PHP_EOL;
var_dump( pm_factorial(10) );

echo PHP_EOL . '-----TEST pm_factorial(-10)-----' . PHP_EOL;
var_dump( pm_factorial(-10) );

echo PHP_EOL . '-----TEST pm_factorial(5.3)-----' . PHP_EOL;
var_dump( pm_factorial(5.3) );
?>