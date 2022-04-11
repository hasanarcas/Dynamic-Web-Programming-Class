<?php

function mySplit($myStr){
    $myStr=explode(" ",$myStr);
    return $myStr;
}

function smallest($arr){
    for($i = 0; $i < count($arr); $i++) {
        // cast to integer
        $arr[$i] = (int)$arr[$i];
    }

    // find miniumum inside numArray
    $min = $arr[0];
    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] < $min) {
            $min = $arr[$i];
        }
    }
    return $min;
}

function selectionSort($arr){
    // for($i = 0; $i < count($arr); $i++) {
    //     // cast to integer
    //     $arr[$i] = (int)$arr[$i];
    // }
    // selection sort algorithm using the findMinIndex function
    for($i = 0; $i < count($arr); $i++) {
        $minIndex = findMinIndex($arr, $i); // 6

        $temp = $arr[$i];  // 13
        $arr[$i] = $arr[$minIndex];   // arr[1] = 2
        $arr[$minIndex] = $temp;       // arr[5] = 12
    }

    return $arr;

}

function findMinIndex($nums, $startIndex){
    $minIndex = $startIndex;
    for($i = $startIndex; $i < count($nums); $i++) {
        if($nums[$i] < $nums[$minIndex]) {
            $minIndex = $i;
        }
    }
    return $minIndex;
}   


class Student{
    public $name;
    public $grades;
    function __construct($name, $grds){
        $this->name = $name;
        $this->grades = $grds;
    }
}


?>