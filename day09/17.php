<?php
/*
编写一个函数来查找字符串数组中的最长公共前缀。

如果不存在公共前缀，返回空字符串 ""。

示例 1:

输入: ["flower","flow","flight"]
输出: "fl"
示例 2:

输入: ["dog","racecar","car"]
输出: ""
解释: 输入不存在公共前缀。
 */
 	function longestCommonPrefix($strs) {
       	$str = '';
	    for ($i = 0; $i < strlen($strs[0]); $i++) {
	        $str .= substr($strs[0],$i,1);
	        for ($l = 1; $l < count($strs); $l++) {
	            if ($str != substr($strs[$l], 0, $i+1)) {
	                return substr($str, 0, strlen($str)-1);
	            }
	        }
	    }
    	return $str;
    }
    echo longestCommonPrefix(["dog","racecar","car"]);
