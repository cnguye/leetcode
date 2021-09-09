<?php

// Divide and Conquer

function maxNum($nums){
    return getMaxNum($nums, 0, count($nums) - 1);
}

function getMaxNum($nums, $start, $end){
    if($start == $end){
        return $nums[$start];
    }
    $middle = floor(($start + $end) / 2);
    $leftNum = getMaxNum($nums, $start, $middle);
    $rightNum = getMaxNum($nums, $middle + 1, $end);
    
    return $leftNum > $rightNum ? $leftNum : $rightNum;
}

$nums = [70, 250, 50, 80, 140, 12, 14];
print_r(maxNum($nums));