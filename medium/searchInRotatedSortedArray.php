<?php

/*
33. Search in Rotated Sorted Array - https://leetcode.com/problems/search-in-rotated-sorted-array/

There is an integer array nums sorted in ascending order (with distinct values).

Prior to being passed to your function, nums is possibly rotated at an unknown pivot 
index k (1 <= k < nums.length) such that the resulting array is [nums[k], nums[k+1], ..., 
nums[n-1], nums[0], nums[1], ..., nums[k-1]] (0-indexed). 

For example, [0,1,2,4,5,6,7] might be rotated at pivot index 3 and become [4,5,6,7,0,1,2].

Given the array nums after the possible rotation and an integer target, return the 
index of target if it is in nums, or -1 if it is not in nums.

You must write an algorithm with O(log n) runtime complexity.

Example 1:
Input: nums = [4,5,6,7,0,1,2], target = 0
Output: 4

Example 2:
Input: nums = [4,5,6,7,0,1,2], target = 3
Output: -1

Example 3:
Input: nums = [1], target = 0
Output: -1

*/

function search($nums, $target) {
    if (count($nums) <= 1) {
        if (!isset($nums[0])) return -1;
        if ($nums[0] === $target)
            return 0;
        elseif ($nums[0] !== $target)
            return -1;
    }
    $realStartingIndex = getRealStartingIndex($nums, 0, count($nums) - 1);
    if ($target === $nums[$realStartingIndex]) return $realStartingIndex;
    if ($realStartingIndex === 0)
        return getTargetIndex($nums, $target, 0, count($nums) - 1);
    if ($nums[$realStartingIndex] < $nums[count($nums) - 1]) {
        if ($target > $nums[count($nums) - 1]) {
            return getTargetIndex($nums, $target, 0, $realStartingIndex - 1);
        } else
            return getTargetIndex($nums, $target, $realStartingIndex + 1, count($nums) - 1);
    } elseif ($realStartingIndex == count($nums) - 1)
        return getTargetIndex($nums, $target, 0, $realStartingIndex - 1);
    return -1;
}

function getRealStartingIndex($nums, $start, $end) {
    while ($end > $start) {
        $middleIndex = floor(($start + $end) / 2);
        $middleNum = $nums[$middleIndex];
        $prevIndex = $middleIndex == 0 ? count($nums) - 1 : $middleIndex - 1;
        if ($middleNum < $nums[$prevIndex])
            return $middleIndex;
        elseif ($nums[$end] < $middleNum) {
            $start = $middleIndex + 1;
        } else
            $end = $middleIndex - 1;
    }
    return $start;
}

function getTargetIndex($nums, $target, $start, $end) {
    while ($end > $start) {
        $middleIndex = floor(($start + $end) / 2);
        $middleNum = $nums[$middleIndex];
        if ($middleNum === $target) return $middleIndex;
        if ($middleNum > $target)
            $end = $middleIndex - 1;
        else
            $start = $middleIndex + 1;
    }
    if ($nums[$start] === $target) return $start;
    else return -1;
}

$nums = [4, 5, 6, 7, 0, 1, 2];
$nums = [1, 3];
$nums = [3, 1];
$nums = [3, 4, 5, 6, 1, 2];
$target = 2;

$numCases = [
    [
        'nums' => [4, 5, 6, 7, 0, 1, 2],
        'target' => 2,
        'expected' => 6
    ],
    [
        'nums' => [1, 3],
        'target' => 0,
        'expected' => -1
    ],
    [
        'nums' => [1, 3],
        'target' => 1,
        'expected' => 0
    ],
    [
        'nums' => [3, 1],
        'target' => 2,
        'expected' => -1
    ],
    [
        'nums' => [3, 4, 5, 6, 1, 2],
        'target' => 4,
        'expected' => 1
    ],
    [
        'nums' => [4, 5, 6, 7, 0, 1, 2],
        'target' => 9,
        'expected' => -1
    ]
];

function runTests($cases){
    foreach($cases as $key=>$case){
        $ans = search($case['nums'], $case['target']);
        if($case['expected'] != $ans)
            echo "FAILED case: " . strval($key + 1) ."!! Expected " . $case['expected'] . "\t Output " . $ans . "\n";
        else
            echo "PASSED case: " . strval($key + 1) ."\n";
    }
}

runTests($numCases);
