<?php
function test($arg, $arg2)
{
	//echo '*' .  $arg . '-----' . $arg2 .  '<br />';
	return '*'.$arg.'-----'.$arg2.'<br />';
}
$result = test('helloworld', 'haha');
$result2 = test('codingeverybody', 'good');
echo $result.$result2;

function test2()
{
	return '<br />'. 'value : test2';
}
echo test2();
?>
