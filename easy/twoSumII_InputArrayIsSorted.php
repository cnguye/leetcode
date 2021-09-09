<?php

/*
167. Two Sum II - Input array is sorted - https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/

Given an array of integers numbers that is already sorted in non-decreasing order, find two numbers such that they add up to a specific target number.

Return the indices of the two numbers (1-indexed) as an integer array answer of size 2, where 1 <= answer[0] < answer[1] <= numbers.length.

The tests are generated such that there is exactly one solution. You may not use the same element twice.
*/

function twoSumSlow($numbers, $target) {
    $first = 0;
    $second = 1;
    if (count($numbers) == 2) return [1, 2];

    while ($first < count($numbers) - 1) {
        if (($numbers[$first] + $numbers[$second]) == $target)
            return [$first + 1, $second + 1];
        elseif (($numbers[$first] + $numbers[$second]) > $target) {
            $first++;
            $second = $first + 1;
        } else {
            if ($second == (count($numbers) - 1)) {
                $first++;
                $second = $first + 1;
            } else
                $second++;
        }
    }
    return [$first + 1, $second + 1];
}

function twoSum($numbers, $target) {
    $start = 0;
    $end = count($numbers) - 1;
    while ($start < ($end - 1)) {
        $sum = $numbers[$start] + $numbers[$end];
        if ($sum > $target)
            $end--;
        if ($sum < $target)
            $start++;
        if ($sum == $target)
            break;
    }
    return [$start + 1, $end + 1];
}

$numbers = [1, 2, 3, 4, 4, 9, 56, 90];
$target = 8;
$numbers = [-1, 0];
$target = -1;
$numbers = [2, 7, 11, 15];
$target = 18;
$numbers = [0, 0, 3, 4];
$target = 0;
print_r(twoSum($numbers, $target));
