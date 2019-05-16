<?php
// 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。

// 示例 1:

// 输入: "abcabcbb"
// 输出: 3 
// 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
// 示例 2:

// 输入: "bbbbb"
// 输出: 1
// 解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
// 示例 3:

// 输入: "pwwkew"
// 输出: 3
// 解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
//      请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
function lengthOfLongestSubstring($s) {
	$length=0;//长度
	$start=0;//分段的起始位置
	$arr=[];//更新每个值得键
	if (empty($s)) {
  		return 0;
	}
	$str = str_split($s);//字符串转数组
	$num = count($str);//数组长度
	if ($num == 1) {//长度等于1时直接返回1
		return 1;
	}        
	foreach ($str as $k => $v){
		
		//计算重复
	    if(@$arr[$v]!==null&&$arr[$v]>=$start){
	        $start=$arr[$v]+1;
	    }

	    //计算长度
	    if(($k-$start+1)>$length){
	        $length=$k-$start+1;
	    }
	    $arr[$v]=$k;
	}

	return $length;
}
echo '<pre>';
print_r(lengthOfLongestSubstring('pasd'));
/*
                                    
$s = 0									
$l = 4
$arr = ['p'=>0,'a'=>1,'s'=>2,'d'=>3]




 */
