<?php

/*
119. Pascal's row II - https://leetcode.com/problems/pascals-row-ii/

Given an integer rowIndex, return the rowIndexth (0-indexed) row of the Pascal's row.

In Pascal's row, each number is the sum of the two numbers directly above it.

Example 1:
Input: rowIndex = 3
Output: [1,3,3,1]

Example 2:
Input: rowIndex = 0
Output: [1]

Example 3:
Input: rowIndex = 1
Output: [1,1]

1
1 1
1 2 1
1 3 3  1
1 4 6  4  1
1 5 10 10 5  1
1 6 15 20 15 6  1
1 7 21 35 35 21 7 1
*/

class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $row = [1];
        for($i = 1; $i <= $rowIndex; $i++){
            $prevRow = $row;
            for($k = 0; $k < $i; $k++){
                $prevPrevNum = isset($prevRow[$k - 1]) ? $prevRow[$k - 1] : 0;
                $currPrevNum = $prevRow[$k];
                $row[$k] = $prevPrevNum + $currPrevNum;
            }
            $row[] = 1;
        }
        return $row;
    }
}

$ans = new Solution();
$rowIndex = 5;
print_r($ans->getRow($rowIndex));
