<?php

/*
88. Merge Sorted Array - https://leetcode.com/problems/merge-sorted-array/

You are given two integer arrays nums1 and nums2, sorted in non-decreasing order, 
and two integers m and n, representing the number of elements in nums1 and nums2 
respectively.

Merge nums1 and nums2 into a single array sorted in non-decreasing order.

The final sorted array should not be returned by the function, but instead be 
stored inside the array nums1. To accommodate this, nums1 has a length of m + n, 
where the first m elements denote the elements that should be merged, and the 
last n elements are set to 0 and should be ignored. nums2 has a length of n.

Example 1:

Input: nums1 = [1,2,3,0,0,0], m = 3, nums2 = [2,5,6], n = 3
Output: [1,2,2,3,5,6]
Explanation: The arrays we are merging are [1,2,3] and [2,5,6].
The result of the merge is [1,2,2,3,5,6] with the underlined elements coming from nums1.

Example 2:

Input: nums1 = [1], m = 1, nums2 = [], n = 0
Output: [1]
Explanation: The arrays we are merging are [1] and [].
The result of the merge is [1].

Example 3:

Input: nums1 = [0], m = 0, nums2 = [1], n = 1
Output: [1]
Explanation: The arrays we are merging are [] and [1].
The result of the merge is [1].
Note that because m = 0, there are no elements in nums1. The 0 is only there to ensure the merge result can fit in nums1.

*/

function merge(&$nums1, $m, $nums2, $n) {
    if($m === 0)
        $nums1 = $nums2;
    $runnerM = $m - 1;
    $runnerN = $n - 1;
    $end = $m + $n - 1;
    while($runnerM >= 0 && $runnerN >= 0){
        if($nums1[$runnerM] > $nums2[$runnerN]) {
            $nums1[$end] = $nums1[$runnerM];
            $runnerM--;
        }
        else{
            $nums1[$end] = $nums2[$runnerN];
            $runnerN--;
        }
        $end--;
    }
    if($runnerM >= 0){
        while($runnerM >= 0){
            $nums1[$end] = $nums1[$runnerM];
            $end--;
            $runnerM--;
        }
    }
    if($runnerN >= 0){
        while($runnerN >= 0){
            $nums1[$end] = $nums2[$runnerN];
            $end--;
            $runnerN--;
        }
    }
}

function mergeTrashMemory(&$nums1, $m, $nums2, $n) {
    $tempNums1 = [];
    $runnerM = $runnerN = 0;
    while ($runnerM < $m || $runnerN < $n) {
        if ($runnerM >= $m) {
            $tempNums1[] = $nums2[$runnerN];
            $runnerN++;
        } elseif ($runnerN >= $n) {
            $tempNums1[] = $nums1[$runnerM];
            $runnerM++;
        } elseif ($nums1[$runnerM] <= $nums2[$runnerN]) {
            $tempNums1[] = $nums1[$runnerM];
            $runnerM++;
        } elseif ($nums1[$runnerM] >= $nums2[$runnerN]) {
            $tempNums1[] = $nums2[$runnerN];
            $runnerN++;
        }
    }
    $nums1 = $tempNums1;
}

$nums1 = [2,0];
$nums2 = [1];
$m = 1;
$n = 1;
merge($nums1, $m, $nums2, $n);
print_r($nums1);

/*
for($i = 0; $i < $m; $i++){
        if($nums1[$i] > $nums2[0]){
            $temp = $nums1[$i];
            $nums1[$i] = $nums2[0];
            $nums2[0] = $temp;

            if($nums2[0] > $nums2[1]){
                $temp = $nums2[0];
                $nums2[0] = $nums2[1];
                $nums2[1] = $temp;
            }
        }
    }
    for($i = 0; $i < $n - 1; $i++){
        $offset = $i + $m;
        if($nums2[$i] > $nums2[$i + 1]){
            echo "i: $i\n";
            $nums1[$offset] = $nums2[$i + 1];
            $nums2[$i + 1] = $nums2[$i];
        }
        else {
            echo "hi: $i\n";
            $nums1[$offset] = $nums2[$i];
        }
    }
    $nums1[$m + $n - 1] = end($nums2);
*/

/*
    $runnerM = $runnerN = 0;
    $temp = null;
    while ($runnerM < $m || $runnerN < $n) {
        echo "runnerM: $runnerM m: $m | runnerN: $runnerN n: $n\n";
        if ($runnerM >= $m) {
            $nums1[$m + $runnerN] = $nums2[$runnerN];
            $runnerN++;
        } elseif ($runnerN >= $n) {
            $nums1[$n + $runnerM] = $nums1[$runnerM];
            $tempNums1[] = $nums1[$runnerM];
            $runnerM++;
        } 
        else {
            echo "nums1[runnerM]: $nums1[$runnerM] | nums2[runnerN]: $nums2[$runnerN]\n";
            if (!is_null($temp)) {
                if ($temp < $nums1[$runnerM]) {
                    $tempNum1RunnerM = $nums1[$runnerM];
                    $nums1[$runnerM] = $temp;
                    $temp = $tempNum1RunnerM;
                }
            }
            if ($nums1[$runnerM] <= $nums2[$runnerN]) {
                $runnerM++;
            } elseif ($nums2[$runnerN] < $nums1[$runnerM]) {
                $temp = $nums1[$runnerM];
                $nums1[$runnerM] = $nums2[$runnerN];
                $runnerN++;
                $runnerM++;
            }
        }
    }
*/