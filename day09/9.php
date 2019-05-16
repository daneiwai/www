<?php
/*
将一个给定字符串根据给定的行数，以从上往下、从左到右进行 Z 字形排列。

比如输入字符串为 "LEETCODEISHIRING" 行数为 3 时，排列如下：

L   C   I   R
E T O E S I I G
E   D   H   N
之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："LCIRETOESIIGEDHN"。

请你实现这个将字符串进行指定行数变换的函数：

string convert(string s, int numRows);
示例 1:

输入: s = "LEETCODEISHIRING", numRows = 3
输出: "LCIRETOESIIGEDHN"
示例 2:

输入: s = "LEETCODEISHIRING", numRows = 4
输出: "LDREOEIIECIHNTSG"
解释:
0     6     12
L     D     R
1   5 7  11 13
E   O E   I I
2 4   8 10  14
E C   I H   N
3     9     15
T     S     G
 */
function convert($s, $numRows) {
	if ($numRows == 1) {
		return $s;
	} 
	$str = '';
	$len = strlen($s);//字符长度
	$k   = 2*$numRows-2;    //6
	for ($i = 0; $i < $numRows; $i++) {
		for ($j = 0; $j<$len; $j+=$k) {
			$str .= $s[$j+$i];
			if ($i != 0 && $i != $numRows-1  ) {
				$str .= $s[$j+$k-$i];
			}					
		}
	}  
	// for ($i = 0; $i < $numRows; $i++) {
	// 	for ($j = 0; $j+$i<$len; $j+=$k) {
	//  		$str .= $s[$j+$i];
	//  		if ($i != 0 && $i != $numRows-1 && $j+$k-$i<$len) {
	//  			$str .= $s[$j+$k-$i];
	//  		}
	// 	}
	// }  
	return $str;
}
echo convert('LEETCODEISHIRING',5);
/*
0		8
l       i
1     7    9           15
e     e   s           g
2   6       10      14
e   d       h       n
3  5          11  13
t o           i   i
4              12
c               r
 */
//LIEESEDHTOICR
//LIEESGEDHNTOIICR
//LIEESGEDHNTOIICR