<?php

/*
169. Majority Element - https://leetcode.com/problems/majority-element/

Given an array nums of size n, return the majority element.

The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.

Example 1:
Input: nums = [3,2,3]
Output: 3

Example 2:
Input: nums = [2,2,1,1,1,2,2]
Output: 2

Follow-up: Could you solve the problem in linear time and in O(1) space?
*/

// Space: O(n), Time: O(n)
function majorityElementNN($nums) {
    $numStack = [];
    foreach ($nums as $num) {
        if (!isset($numStack[$num]))
            $numStack[$num] = 1;
        else
            $numStack[$num]++;
    }
    $maxNum = $maxVal = null;
    foreach ($numStack as $num => $numVal) {
        if ($numVal > $maxVal) {
            $maxVal = $numVal;
            $maxNum = $num;
        }
    }
    return $maxNum;
}

function majorityElement($nums) {
    $numIndex = 0;
    $currNumCounter = 1;
    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] == $nums[$numIndex])
            $currNumCounter++;
        else {
            $currNumCounter--;
            if ($currNumCounter == 0) {
                $numIndex = $i;
                $currNumCounter = 1;
            }
        }
    }
    return $nums[$numIndex];
}

function majorityElementRevisited($nums) {
    $curr_num = array_shift($nums);
    $num_count = 1;
    foreach($nums as $num){
        if($num !== $curr_num){
            if($num_count === 0) {
                $curr_num = $num;
                $num_count = 1;
            }
            else {
                $num_count--;
            }
        }
        else {
            $num_count++;
        }
    }
    return $curr_num;
}

$nums = [2,2,1,1,1,2,2];
print_r(majorityElementRevisited($nums));
echo "\n";
