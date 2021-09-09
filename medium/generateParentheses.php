<?php

/*
Generate Parentheses - https://leetcode.com/problems/generate-parentheses/

Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.

Example 1:

Input: n = 3
Output: ["((()))","(()())","(())()","()(())","()()()"]

Example 2:

Input: n = 1
Output: ["()"]

Example 3:

Input: n = 2
Output: ["()()", "(())"]

Constraints:
    1 <= n <= 8
 */

function generateParenthesis($n) {
    $set = [];
    getGenerateParenthesis($set, $n, '', 0, 0);
    return $set;
}

function getGenerateParenthesis(&$set, $n, $currSet, $currOpen, $currDone) {
    if ($currDone == $n && $currOpen == 0)
        $set[] = $currSet;
    if($currOpen >= 0 && $currOpen <= $n && $currDone <= $n){
        getGenerateParenthesis($set, $n, $currSet . '(', $currOpen + 1, $currDone);
    }
    if($currOpen > 0 && $currDone < $n){
        getGenerateParenthesis($set, $n, $currSet . ')', $currOpen - 1, $currDone + 1);
    }
}

$n = 4;
print_r(generateParenthesis($n));
