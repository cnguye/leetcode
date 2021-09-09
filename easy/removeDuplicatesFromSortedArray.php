<?php

/*
26. Remove Duplicates from Sorted Array - https://leetcode.com/problems/remove-duplicates-from-sorted-array/

Given an integer array nums sorted in non-decreasing order, remove the duplicates 
in-place such that each unique element appears only once. The relative order of 
the elements should be kept the same.

Return k after placing the final result in the first k slots of nums.

Do not allocate extra space for another array. You must do this by modifying the 
input array in-place with O(1) extra memory.

Example:
Input: nums = [0,0,1,1,1,2,2,3,3,4]
Output: 5, nums = [0,1,2,3,4,_,_,_,_,_]
Explanation: Your function should return k = 5, with the first five elements of nums being 0, 1, 2, 3, and 4 respectively.
It does not matter what you leave beyond the returned k (hence they are underscores).
*/

function removeDuplicatesSlow(&$nums) {
    $prevNum = null;
    $head = 0;
    $runner = 1;
    while ($runner < (count($nums))) {
        if ($prevNum !== $nums[$head]) {
            $prevNum = $nums[$head];
        } else {
            while ($nums[$runner] == $prevNum) {
                $runner++;
                if($runner >= count($nums))
                    break 2;
            }

            $tempHead = $head;
            while ($tempHead < $runner) {
                $nums[$tempHead] = $nums[$runner];
                $tempHead++;
            }
            $prevNum = $nums[$head];
        }
        $head++;
        $runner++;
    }
}

function removeDuplicates(&$nums) {
    foreach($nums as $key=>$num){
        if(isset($nums[$key + 1]) && $nums[$key + 1] == $num)
            unset($nums[$key]);
    }
}


$nums = [1, 1, 2, 3, 3, 3];
$nums = [1,2];
$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
removeDuplicates($nums);
print_r($nums);
