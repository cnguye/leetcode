<?php

/*
56. Merge Intervals - https://leetcode.com/problems/merge-intervals/

Given an array of intervals where intervals[i] = [starti, endi], merge all overlapping intervals, 
and return an array of the non-overlapping intervals that cover all the intervals in the input.

Example 1:
Input: intervals = [[1,3],[2,6],[8,10],[15,18]]
Output: [[1,6],[8,10],[15,18]]
Explanation: Since intervals [1,3] and [2,6] overlaps, merge them into [1,6].

Example 2:
Input: intervals = [[1,4],[4,5]]
Output: [[1,5]]
Explanation: Intervals [1,4] and [4,5] are considered overlapping.


*/

function merge($intervals) {
    // sort 2D array
    array_multisort($intervals);
    for ($i = 0; $i < (count($intervals) - 1); $i++) {
        $overlapping = true;
        while ($overlapping && count($intervals) > 1) {
            if (($intervals[$i + 1][0] <= $intervals[$i][1]) && ($intervals[$i + 1][0] >= $intervals[$i][0])) {
                if($intervals[$i + 1][1] > $intervals[$i][1])
                    $intervals[$i][1] = $intervals[$i + 1][1];
                unset($intervals[$i + 1]);
                $intervals = array_values($intervals);
            }
            else
                $overlapping = false;
        }
    }

    return $intervals;
}

$intervals = [[1, 3], [2, 6], [8, 10], [15, 18]];
$intervals = [[1,4],[4,5]];
$intervals = [[1,2], [1,2]];
$intervals = [[1,4],[2,3]];
print_r(merge($intervals));
