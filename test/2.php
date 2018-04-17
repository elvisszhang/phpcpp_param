<?php
echo PHP_EOL . '-----TEST pm_add()-----' . PHP_EOL;
var_dump( pm_add() );

echo PHP_EOL . '-----TEST pm_add(1)-----' . PHP_EOL;
var_dump( pm_add(1) );

echo PHP_EOL . '-----TEST pm_add(\'abc\',\'def\')-----' . PHP_EOL;
var_dump( pm_add('abc','def') );

echo PHP_EOL . '-----TEST pm_add(\'1\',\'2\')-----' . PHP_EOL;
var_dump( pm_add('1','2') );

echo PHP_EOL . '-----TEST pm_add(1,2)-----' . PHP_EOL;
var_dump( pm_add(1,2) );

echo PHP_EOL . '-----TEST pm_add(1.3,2.4)-----' . PHP_EOL;
var_dump( pm_add(1.3,2.4) );
?>