<?php
echo PHP_EOL . '-----TEST pm_datetype($time)-----' . PHP_EOL;
$time = new DateTime();
pm_datetype($time);

echo PHP_EOL . '-----TEST pm_datetype(\'2018-04-17\')-----' . PHP_EOL;
pm_datetype('2018-04-17');
?>