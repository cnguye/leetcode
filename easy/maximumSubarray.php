<?php

/*
Maximum Subarray - https://leetcode.com/problems/maximum-subarray/
Given an integer array nums, find the contiguous subarray (containing at least one number) which has the largest sum and return its sum.

Example 1:

Input: nums = [-2,1,-3,4,-1,2,1,-5,4]
Output: 6
Explanation: [4,-1,2,1] has the largest sum = 6.

Example 2:
Input: nums = [1]
Output: 1

Example 3:
Input: nums = [5,4,-1,7,8]
Output: 23

*/

// O(n)
function maxSubArrayN($nums) {
    $max = $currSum = null;
    foreach ($nums as $num) {
        $currSum += $num;
        if ($num >= $currSum)
            $currSum = $num;
        if ($currSum >= $max)
            $max = $currSum;
    }
    return is_null($max) ? 0 : $max;
}

function maxSubArray($nums) {
    $output = getMaxSubArray($nums, 0, count($nums) - 1, '');
    return $output;
}

function getMaxSubArray($nums, $start, $end) {
    if($start == $end)
        return $nums[$start];
    
    $middle = floor(($start + $end) / 2);    
    $leftMax = getMaxSubArray($nums, $start, $middle);
    $rightMax = getMaxSubArray($nums, $middle + 1, $end);
    
    $leftSide = $tempLeft = $nums[$middle];
    for($i = $middle - 1; $i >= $start; $i--){
        $tempLeft += $nums[$i];
        if($tempLeft > $leftSide)
            $leftSide = $tempLeft;
    }
    $leftMax = max($leftMax, $leftSide);
    
    $rightSide = $tempRight = $nums[$middle + 1];
    for($i = $middle + 2; $i <= $end; $i++){
        $tempRight += $nums[$i];
        if($tempRight > $rightSide)
            $rightSide = $tempRight;
    }
    $rightMax = max($rightMax, $rightSide);

    $centerMax = $leftSide + $rightSide;

    return max($leftMax, $rightMax, $centerMax);
}


$nums = [-2, -1]; // expects -1
$nums = [0]; // expects 0
$nums = [-1, -2]; // expects -1
$nums = [-1, 2, 1];
$nums = [-2, 1, -3, 4, -1, 2, 1]; // expected: 6
$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4]; // expected: 6
$nums = [8, -19, 5, -4, 20]; // expected 21
$nums = [-2, 1, 3, 4, -11, 4, 7, -1, 2, 1, -5, 4]; // expected: 13

var_dump(maxSubArray($nums));
