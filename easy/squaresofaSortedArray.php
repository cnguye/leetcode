<?php

/*
977. Squares of a Sorted Array - https://leetcode.com/problems/squares-of-a-sorted-array/

Given an integer array nums sorted in non-decreasing order, return an array of the squares 
of each number sorted in non-decreasing order.

Example 1:

Input: nums = [-4,-1,0,3,10]
Output: [0,1,9,16,100]
Explanation: After squaring, the array becomes [16,1,0,9,100].
After sorting, it becomes [0,1,9,16,100].

Example 2:

Input: nums = [-7,-3,2,3,11]
Output: [4,9,9,49,121]

Follow up:  Squaring each element and sorting the new array is very trivial, 
            could you find an O(n) solution using a different approach?
*/

function sortedSquares($nums) {
    $runnerPos = count($nums) - 1;
    $runnerNeg = 0;
    $insertIndex = count($nums) - 1;
    $returnNums = array_fill(0, count($nums), 0);

    while($runnerPos != $runnerNeg){
        if(abs($nums[$runnerNeg]) > $nums[$runnerPos]){
            $returnNums[$insertIndex] = pow($nums[$runnerNeg], 2);
            $runnerNeg++;
            $insertIndex--;
        }
        else {
            $returnNums[$insertIndex] = pow($nums[$runnerPos], 2);
            $runnerPos--;
            $insertIndex--;
        }
    }
    $returnNums[0] = pow($nums[$runnerPos], 2);
    return $returnNums;
}

function print_arr($arr){
    $str = '';
    foreach($arr as $val){
        $str .= "$val,";
    }
    $str = rtrim($str, ',');
    echo "[$str]\n";
}

$nums = [-7,-3,2,3,11];
$nums = [-6, -4, -2, 1, 4, 7, 9];
echo "Output: ";
print_arr(sortedSquares($nums));
echo "Expected: [4,9,9,49,121]\n";