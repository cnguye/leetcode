<?php

/*
118. Pascal's Triangle - https://leetcode.com/problems/pascals-triangle/

Given an integer numRows, return the first numRows of Pascal's triangle.

In Pascal's triangle, each number is the sum of the two numbers directly above it

Example 1:
Input: numRows = 5
Output: [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]

Example 2:
Input: numRows = 1
Output: [[1]]
*/

class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generateSlow($numRows) {
        $triangle = [[1]];
        $end = 0;
        $currRow = 2;
        while ($currRow <= $numRows) {
            $newRow = [];
            $newRow[] = $triangle[$end][0];
            for ($i = 1; $i < count($triangle[$end]); $i++) {
                $newRow[] = $triangle[$end][$i - 1] + $triangle[$end][$i];
            }
            $newRow[] = $triangle[$end][0];
            $triangle[] = $newRow;
            $currRow++;
            $end++;
        }
        return $triangle;
    }

    function generate($numRows) {
        $triangle = array_fill(0, $numRows, [1]);
        $prevIndex = 0;
        while (count($triangle[$numRows - 1]) < $numRows) {
            for ($level = 0; $level < $numRows; $level++) {
                $row = $triangle[$level];
                if (count($row) < ($level + 1)) {
                    $prev = $triangle[$level - 1][$prevIndex];
                    $above = isset($triangle[$level - 1][$prevIndex + 1]) ? $triangle[$level - 1][$prevIndex + 1] : 0;
                    $triangle[$level][] = $prev + $above;
                }
            }
            $prevIndex++;
        }
        return $triangle;
    }
}

function print_triangle($arrays) {
    $output = '';
    foreach ($arrays as $arr) {
        $str = '';
        foreach ($arr as $num) {
            $str .= "$num ";
        }
        $str .= "\n";
        $output .= $str;
    }
    echo $output;
}

$numRows = 5;
$solution = new Solution();
print_triangle($solution->generate($numRows));
