<?php

/*
2221. Find Triangular Sum of Array - https://leetcode.com/problems/find-triangular-sum-of-an-array/

You are given a 0-indexed integer array nums, 
where nums[i] is a digit between 0 and 9 (inclusive).

The triangular sum of nums is the value of the only element 
present in nums after the following process terminates:

Let nums comprise of n elements. If n == 1, end the process. 
Otherwise, create a new 0-indexed integer array newNums of 
length n - 1. For each index i, where 0 <= i < n - 1, assign 
the value of newNums[i] as (nums[i] + nums[i+1]) % 10, where 
% denotes modulo operator. Replace the array nums with 
newNums. Repeat the entire process starting from step 1.

Return the triangular sum of nums.

Example 1:

1      2       3       4       5
    3       5      7       9
        8       2      6
            0       8
                8

Input: nums = [1,2,3,4,5]
Output: 8
Explanation:
The above diagram depicts the process from which we obtain the triangular sum of the array.

*/

function triangularSum($nums) {
    if(count($nums) === 1)
        return $nums[0];
    $newNums = [];
    for($i = 0; $i < count($nums) - 1; $i++){
        $runner = $i + 1;
        $newNums[] = ($nums[$i] + $nums[$runner] ) % 10;
    }
    return triangularSum($newNums);
}

function triangularSum2($nums) {
    $numsLength = count($nums);
    while($numsLength > 1) {
        for($i = 0; $i < count($nums) - 1; $i++){
            $nums[$i] = ($nums[$i] + $nums[$i + 1]) % 10;
        }
        print_r($nums);
        $numsLength--;
    }
    return $nums[0];
}

$input = [3,2,5,3,6,4,1,1,6,0,2,8,3,1,5,6,0,7,1,5,0,9,2,0,6,5,7,6,3,0,8,3,0,1,4,3,3,1,2,7,7,1,2,0,5,6,4,1,9,4,8,0,1,6,1,0,6,1,5,8,8,6,8,1,1,6,4,2,9,0,0,7,8,9,1,6,6,5,0,7,5,0,6,8,5,8,6,9,3,9,4,1,5,0,6,7,1,1,1,9,8,5,1,5,6,6,5,0,4,8,0,0,6,8,8,2,4,7,9,3,9,2,5,0,7,7,6,5,7,2,1,5,9,4,0,2,4,0,4,7,4,2,6,7,5,7,4,6,0,6,9,7,3,5,5,7,7,6,8,3,1,3,5,0,1,1,0,1,6,4,9,1,9,5,7,5,2,6,6,8,8,0,7,6,0,5,1,9,1,9,3,2,4,3,9,8,4,9,8,0,8,0,5,4,9,9,5,4,5,2,5,3,5,4,7,2,1,9,5,2,8,1,3,6,2,1,1,4,9,6,2,4,9,3,7,4,4,6,5,6,9,4,0,1,8,8,8,2,4,4,0,8,8,6,7,9,5,1,5,8,8,5,0,2,1,9,8,6,4,3,7,6,5,7,5,2,1,4,2,9,9,5,5,2,1,2,4,9,9,2,6,1,1,5,3,2,3,0,1,7,1,9,5,8,8,7,6,6,8,0,3,3,3,5,0,3,5,4,3,3,7,8,5,5,5,0,8,1,8,5,3,6,9,4,5,2,7,2,3,5,6,2,7,2,2,4,7,3,8,6,5,5,2,9,7,7,3,6,9,1,6,8,0,5,6,8,2,0,4,7,5,6,6,5,2,4,4,7,5,9,8,3,7];
$output = 8;
print_r(triangularSum2($input));