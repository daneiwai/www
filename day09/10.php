<?php
/*
给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。

示例 1:

输入: 123
输出: 321
 示例 2:

输入: -123
输出: -321
示例 3:

输入: 120
输出: 21
 */
function reverse($x) {
	$x	 = (string)$x;
	$str = '';
	$str1 = '';
	if ($x == 0) {
		return 0;
	}
	if ($x[0] == '-') {
		$str .= $x[0];
		$x = substr($x, 1);
	}
	$s = str_split($x);
	krsort($s);
	$len = count($s)-1;
	foreach ($s as $k=>$v) {
		if ($v == 0) {
			unset($s[$k]);
		} else {
			break;
		}
	}
	foreach ($s as $vv) {
		$str .= $vv;
	}
	if ($str > (pow(2,31)-1)) {
        $str = 0;
    } elseif ($str < pow(-2,31)) {
        $str = 0;
    }
	return $str;
}
echo '<pre>';
print_r(reverse(1534236469));