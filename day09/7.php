<?php
/*
给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。

请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。

你可以假设 nums1 和 nums2 不会同时为空。

示例 1:

nums1 = [1, 3]
nums2 = [2]

则中位数是 2.0
示例 2:

nums1 = [1, 2]
nums2 = [3, 4]

则中位数是 (2 + 3)/2 = 2.5
 */
function findMedianSortedArrays($nums1, $nums2) {
    $arr = array_merge($nums1,$nums2); 
    sort($arr);  
    $len = count($arr);
    if ($len == 1) {
    	return $arr[$len-1];
    }
  	if ($len%2==0) {
  		$a = $len/2;
  		$num = $arr[$a-1]+$arr[$a];
  		if ($num == 0) {
  			return ;
  		}
  		return $num/2;
  	} elseif ($len%2 != 0) {
  		$n = ceil($len/2);
  		return $arr[$n-1];
  	}
}
$nums1 = [];
$nums2 = [1,2,3,4,5];

echo '<pre>';
print_r(findMedianSortedArrays($nums1,$nums2));
// 1,2,3,4,5,6,7,8,9,10