<?php
/*
给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。

示例 1：

输入: "babad"
输出: "bab"
注意: "aba" 也是一个有效答案。
示例 2：

输入: "cbbd"
输出: "bb"
 */
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $max_len = 0;
        $max_s   = '';
        //暴力解法
        $slen = strlen($s);//字符串长度
        if($slen<1) {  
            return '';
        }
        if($slen==1) {
            return $s;
        }
        if($slen==2) {
            return $s[0] == $s[1] ? $s : $s[0];
        }
        for ($i = 0; $i < $slen - 1; $i++) {
            for ($j = $i + 1; $j < $slen; $j++) {
                if (($j - $i+1)>$max_len) {//6
                    $s_child = substr($s, $i, $j - $i+1);
                    if ($s_child_len = $this->isPalindromic($s_child, $max_len)) {
                        $max_len = $s_child_len;
                        $max_s = $s_child;
                    }
                }

            }
        }
        return empty($max_s)?$s[0]:$max_s;
    }
  
    //判断是否回文字符串，并长度大于目前最大回文长度
    function isPalindromic($str,$max_len) {
        $len = strlen($str);
        if ($len <= $max_len) {
            return false;
        }
        if ($len == 2) {
            return $str[0] == $str[1] ? 2 : FALSE;
        }

        $cycle_count = floor($len / 2);
        for ($i = 0; $i < $cycle_count; $i++) {
            if ($str[$i] !== $str[$len - $i - 1]) {
                return FALSE;
            }
            //是回文字符串
        }
        return $len;
    }
}

$a = new Solution();
echo '<pre>';
print_r($a->longestPalindrome('ababcb'));
// echo '<br>';
// echo substr('ababcb', 0,2);
// echo floor(0.5);