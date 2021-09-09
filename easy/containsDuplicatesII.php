<?php

/*
219. Contains Duplicate II - https://leetcode.com/problems/contains-duplicate-ii/

Given an integer array nums and an integer k, return true if there are two distinct indices i and j in the array such that nums[i] == nums[j] and abs(i - j) <= k.

 

Example 1:
Input: nums = [1,2,3,1], k = 3
Output: true

Example 2:
Input: nums = [1,0,1,1], k = 1
Output: true

Example 3:
Input: nums = [1,2,3,1,2,3], k = 2
Output: false

*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
        $numsStack = [];
        foreach ($nums as $key=>$num) {
            if (!isset($numsStack[$num]))
                $numsStack[$num] = $key;
            else{
                if(($key - $numsStack[$num]) <= $k)
                    return true;
                $numsStack[$num] = $key;
            }
        }
        return false;
    }

    function containsNearbyDuplicateSlow($nums, $k) {
        for ($i = 0; $i < count($nums); $i++) {
            $runner = $i + 1;
            for ($runner = $i + 1; ($runner - $i) <= $k; $runner++) {
                if ($runner >= count($nums))
                    break;
                if ($nums[$runner] == $nums[$i] && ($runner - $i) <= $k)
                    return true;
            }
        }
        return false;
    }
}

$sol = new Solution;
$nums = [1, 2, 3, 1]; // true
$k = 3;
$nums = [1, 0, 1, 1]; // true
$k = 1;
$nums = [99, 99]; // true
$k = 2;
$nums = [0, 1, 2, 3, 4, 5, 0]; // true
$k = 6;
$nums = [1, 2, 3, 1, 2, 3]; // false
$k = 2;
var_dump($sol->containsNearbyDuplicate($nums, $k));
