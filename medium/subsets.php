<?php

/*
78. Subsets - https://leetcode.com/problems/subsets/

Given an integer array nums of unique elements, return all possible subsets (the power set).

The solution set must not contain duplicate subsets. Return the solution in any order.
 
Example 1:

Input: nums = [1,2,3]
Output: [[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]

Example 2:

Input: nums = [0]
Output: [[],[0]]

*/

function subsets($nums) {
    $subsets = [];
    genSubSets($subsets, $nums, [], 0);
    return $subsets;
}

function genSubSets(&$subsets, $nums, $currSet, $index){
    if($index > count($nums))
        return;
    $subsets[] = $currSet;
    for($i = $index; $i < count($nums); $i++){
        $currSet[] = $nums[$i];
        genSubSets($subsets, $nums, $currSet, $i+1);
        array_pop($currSet);
    }
}

$nums = [1,2,3];
print_r(subsets($nums));