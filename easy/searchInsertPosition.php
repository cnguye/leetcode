<?php

/*
35. Search Insert Positionhttps://leetcode.com/problems/search-insert-position/

Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.

You must write an algorithm with O(log n) runtime complexity.

*/

function searchInsert($nums, $target) {
    return getSearchInsert($nums, $target, 0, count($nums) - 1);
}

function getSearchInsert($nums, $target, $start, $end) {
    $middle = floor(($end + $start) / 2);
    $result = null;
    if ($start == $end){
        if ($nums[$middle] == $target){
            echo "hello if\n";
            return $start;
        }
        elseif ($target > $nums[$middle]){
            echo "hello elseif\n";
            return $start + 1;
        }
        else{
            echo "hello else\n";
            return $start;
        }
    }
    if ($target == $nums[$middle])
        return $middle;
    if ($target < $nums[$middle])
        $result = getSearchInsert($nums, $target, 0, $middle);
    else
        $result = getSearchInsert($nums, $target, $middle + 1, $end);
    return $result;
}

$nums = [1,3,5,6];
$target = 5;
print_r(searchInsert($nums, $target));