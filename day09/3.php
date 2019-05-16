<?php
//二分查询
function binsearch($x,$a){
    $c=count($a);
    $lower=0;
    $high=$c-1;
    while($lower<=$high){
        $middle=intval(($lower+$high)/2);
        if($a[$middle]>$x){
            $high=$middle-1;
        } elseif($a[$middle]<$x){
            $lower=$middle+1;
        } else{
            return $middle;
        }
    }
    return -1;
}

/*二分查找：前提，该数组已经是一个有序数组，必须先排序，再查找。*/
function binarySearch(&$array,$findVal,$leftIndex,$rightIndex){
	$middleIndex=round(($rightIndex+$leftIndex)/2);
	if($leftIndex>$rightIndex){
		echo'查无此数<br/>';
		return;
	}
	if($findVal>$array[$middleIndex]){
		binarySearch($array,$findVal,$middleIndex+1,$rightIndex);
	}elseif($findVal<$array[$middleIndex]){
		binarySearch($array,$findVal,$leftIndex,$middleIndex-1);
	}else{
		echo"找到数据:index=$middleIndex;value=$array[$middleIndex]<br/>";
		if($array[$middleIndex+1]==$array[$middleIndex]&&$leftIndex<$rightIndex){
			binarySearch($array,$findVal,$middleIndex+1,$rightIndex);
		}
		if($array[$middleIndex-1]==$array[$middleIndex]&&$leftIndex<$rightIndex){
			binarySearch($array,$findVal,$leftIndex,$middleIndex-1);
		}
	}
}