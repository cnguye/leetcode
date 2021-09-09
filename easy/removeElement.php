<?php

/*
27. Remove Element - https://leetcode.com/problems/remove-element/

Given an integer array nums and an integer val, remove all occurrences of val in nums in-place. The relative order of the elements may be changed.

Since it is impossible to change the length of the array in some languages, you must instead have the result be placed in the first part of the array nums. 
More formally, if there are k elements after removing the duplicates, then the first k elements of nums should hold the final result. 
It does not matter what you leave beyond the first k elements.

Return k after placing the final result in the first k slots of nums.

Do not allocate extra space for another array. You must do this by modifying the input array in-place with O(1) extra memory.
*/

function removeElement(&$nums, $val) {
    $runner = $currIndex = $numSwaps = 0;
    while ($runner < count($nums)) {
        while ($runner < count($nums) && $nums[$runner] == $val) {
            $nums[$runner] = null;
            $runner++;
            $numSwaps++;
        }
        if (isset($nums[$runner])) {
            $nums[$currIndex] = $nums[$runner];
            if ($runner != $currIndex)
                $nums[$runner] = null;
        }
        $currIndex++;
        $runner++;
    }
    return count($nums) - $numSwaps;
}

$nums = [1];
$nums = [0, 1, 2, 2, 3, 0, 4, 2];
$nums = [3, 2, 3];
$nums = [2];
$val = 2;
print_r(removeElement($nums, $val));
print_r($nums);
