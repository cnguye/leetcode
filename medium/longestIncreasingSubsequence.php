<?php

/*
300. Longest Increasing Subsequence - https://leetcode.com/problems/longest-increasing-subsequence/

Given an integer array nums, return the length of the longest strictly increasing subsequence.

A subsequence is a sequence that can be derived from an array by deleting some or no elements without 
changing the order of the remaining elements. For example, [3,6,2,7] is a subsequence of the array [0,3,1,6,2,2,7].

 

Example 1:
Input: nums = [10,9,2,5,3,7,101,18]
Output: 4
Explanation: The longest increasing subsequence is [2,3,7,101], therefore the length is 4.

Example 2:
Input: nums = [0,1,0,3,2,3]
Output: 4

Example 3:
Input: nums = [7,7,7,7,7,7,7]
Output: 1

*/

function lengthOfLIS($nums) {
    $lis = array_fill(0, count($nums), 1);
    for ($i = count($nums) - 1; $i >= 0; $i--) {
        for($j = $i + 1; $j < count($nums); $j++){
            if($nums[$i] < $nums[$j]){
                $lis[$i] = max($lis[$i], 1 + $lis[$j]);
            }
        }
    }
    print_r($lis);
    return max($lis);
}

$nums = [1,2,4,3];
$nums = [10, 9, 2, 5, 3, 7, 101, 18];
$nums = [7,7,7,7,7,7,7];
$nums = [0,1,0,3,2,3];
print_r(lengthOfLIS($nums));
