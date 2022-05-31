<?php

/*
217. https://leetcode.com/problems/contains-duplicate/

Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.

Example 1:
Input: nums = [1,2,3,1]
Output: true

Example 2:
Input: nums = [1,2,3,4]
Output: false

Example 3:
Input: nums = [1,1,1,3,3,4,3,2,4,2]
Output: true

*/

function containsDuplicate($nums) {
    $nums_map = [];
    foreach($nums as $key=>$num){
        if(isset($nums_map[$num]))
            return true;
        $nums_map[$num] = 0;
    }
    return false;
}

$nums = [1,1,1,3,3,4,3,2,4,2];
$nums = [1,2,3,4];
var_dump(containsDuplicate($nums));