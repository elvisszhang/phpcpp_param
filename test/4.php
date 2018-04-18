<?php
echo PHP_EOL . '-----数字降序排列-----' . PHP_EOL;
$result = pm_sort(array(22,3,15),function($a,$b){
	//$b > $a则往上冒泡，所以是降序排列
	return $b > $a;
});

echo var_export($result);

echo PHP_EOL . '-----数字升序排列-----' . PHP_EOL;
$result = pm_sort(array(22,3,15),function($a,$b){
	//$b < $a 则往上冒泡，所以是升序排列
	return $b < $a;
});
echo var_export($result);

echo PHP_EOL . '-----学生成绩降序排列-----' . PHP_EOL;
$score = array(
	array('name' => '张三', 'score'=>78),
	array('name' => '李四', 'score'=>98),
	array('name' => '王五', 'score'=>88),
);
$result = pm_sort($score,function($a,$b){
	//$b['score'] > $a['score'] 则往上冒泡，所以是按成绩进行降序排列
	return $b['score'] > $a['score'];
});
echo var_export($result);

echo PHP_EOL . '-----字符串按长度升序排列-----' . PHP_EOL;
function cmp_strlen($a,$b){
	//strlen($b) < strlen($a) 则往上冒泡，所以是按字符串长度进行升序排列
	return strlen($b) < strlen($a);
}
$result = pm_sort(array('country','I','love','my'),'cmp_strlen');
echo var_export($result);

echo PHP_EOL . '-----名字按首字母升序排列-----' . PHP_EOL;
class MyNameSort{
	public static function cmpLetter($a,$b){
		//首字母asscii码小的，则往上冒泡，所以是按首字母进行升序排列
		return ord($b[0]) < ord($a[0]);
	}
}
$result = pm_sort(array('Jack','Tom','Michael','Smith'),'MyNameSort::cmpLetter');
echo var_export($result);
?>