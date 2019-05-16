<?php
/**
* 给定 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。

说明：你不能倾斜容器，且 n 的值至少为 2。



图中垂直线代表输入数组 [1,8,6,2,5,4,8,3,7]。在此情况下，容器能够容纳水（表示为蓝色部分）的最大值为 49。

 

示例:

输入: [1,8,6,2,5,4,8,3,7]
输出: 49
*/
/*
题解:
这种方法背后的思路在于，两线段之间形成的区域总是会受到其中较短那条长度的限制。此外，两线段距离越远，得到的面积就越大。

我们在由线段长度构成的数组中使用两个指针，一个放在开始，一个置于末尾。 此外，我们会使用变量 maxareamaxarea 来持续存储到目前为止所获得的最大面积。 在每一步中，我们会找出指针所指向的两条线段形成的区域，更新 maxareamaxarea，并将指向较短线段的指针向较长线段那端移动一步。

查看下面的例子将有助于你更好地理解该算法：

1 8 6 2 5 4 8 3 7

!?!../Documents/11_Container_Water.json:1000,563!?!

这种方法如何工作？

最初我们考虑由最外围两条线段构成的区域。现在，为了使面积最大化，我们需要考虑更长的两条线段之间的区域。如果我们试图将指向较长线段的指针向内侧移动，矩形区域的面积将受限于较短的线段而不会获得任何增加。但是，在同样的条件下，移动指向较短线段的指针尽管造成了矩形宽度的减小，但却可能会有助于面积的增大。因为移动较短线段的指针会得到一条相对较长的线段，这可以克服由宽度减小而引起的面积减小。

点击这里查看进一步说明，点击这里查看相关证明。


 */

// function maxArea(array$height) {
//     $max = 0;
//     $r   = count($height) - 1;
//     $arr = [];
//     $a = $r;
//     for ($i = 0; $i <= $r; $i++) {
//         for ($j = $i+1; $j <= $r; $j++) {
//             $m = min([$height[$i],$height[$j]]);
//             $arr[] = $m*($j-$i);
//         }
//     }
//     return $arr;
// }
function maxArea($height) {
    $indexl = 0;
    $indexr = count($height)-1;
    $maxCap = 0;
    while ($indexl < $indexr) {
        $curCap = min([$height[$indexl],$height[$indexr]])*($indexr-$indexl);
        $maxCap = $maxCap > $curCap ? $maxCap : $curCap;
        if ($height[$indexl] > $height[$indexr]) {
            $indexr--;
        } else {
            $indexl++;
        } 
    }
    return $maxCap;
}
echo '<pre>';
print_r(maxArea([2,3,4,5,18,17,6]));
//16,15