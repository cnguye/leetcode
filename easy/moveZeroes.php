<?php

/*
283. Move Zeroes - https://leetcode.com/problems/move-zeroes/
Easy

Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.

Note that you must do this in-place without making a copy of the array.

Example 1:
Input: nums = [0,1,0,3,12]
Output: [1,3,12,0,0]

Example 2:
Input: nums = [0]
Output: [0]
 
Follow up: Could you minimize the total number of operations done?

*/

function moveZeroes(&$nums) {
    $head = 0;
    $runner = 1;
    while ($runner < count($nums)) {
        if ($nums[$head] == 0 && $nums[$runner] == 0) {
            $runner++;
        } else {
            if ($nums[$head] == 0 && $nums[$runner] != 0) {
                $nums[$head] = $nums[$runner];
                $nums[$runner] = 0;
            }
            $runner++;
            $head++;
        }
    }
}

function moveZeroes2(&$nums) {
    $tail = 0;
    for ($head = 0; $head < count($nums); $head++) {
        while ($nums[$tail] !== 0) {
            $tail++;
            if (!($tail < count($nums)))
                return;
        }
        while ($nums[$head] === 0) {
            $head++;
            if (!($head < count($nums)))
                return;
        }
        $nums[$tail] = $nums[$head];
        $nums[$head] = 0;
    }
}
$nums = [0, 1, 0, 3, 12];
$nums = [1, 0, 0, 1];
$nums = [0];
$nums = [1];
$nums = [1, 0];
// $testNums = [
//     [0, 1, 0, 3, 12],
//     [1, 0, 0, 1],
//     [0],
//     [1],
//     [1, 0]
// ];
// foreach ($testNums as $key=>$nums) {
// echo "Test Case: $key\n";
moveZeroes2($nums);
print_r($nums);
// }
