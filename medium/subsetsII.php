<?php

/*
Subsets II - https://leetcode.com/problems/subsets-ii/

Given an integer array nums that may contain duplicates, return all possible subsets (the power set).

The solution set must not contain duplicate subsets. Return the solution in any order.

Example 1:

Input: nums = [1,2,2]
Output: [[],[1],[1,2],[1,2,2],[2],[2,2]]

Example 2:

Input: nums = [0]
Output: [[],[0]]

*/

function subsetsWithDup($nums) {
    sort($nums);
    $set = [];
    genSubSetsWithDups($set, $nums, [], 0);
    return $set;
}

function genSubSetsWithDups(&$set, $nums, $currSet, $index){
    if(in_array($currSet, $set))
        return;
    if($index > count($nums))
        return;
    $set[] = $currSet;
    for($i = $index; $i < count($nums); $i++){
        $currSet[] = $nums[$i];
        genSubSetsWithDups($set, $nums, $currSet, $i + 1);
        array_pop($currSet);
    }
}

$nums = [1,2,2];
print_r(subsetsWithDup($nums));