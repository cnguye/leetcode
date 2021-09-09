<?php

/*
125. Valid Palindrome - https://leetcode.com/problems/valid-palindrome/

Given a string s, determine if it is a palindrome, considering only alphanumeric characters and ignoring cases.
*/

function isPalindromeSlow($s) {
    $s = strtolower($s);
    $head = 0;
    $tail = strlen($s) - 1;
    while ($head < $tail) {
        while (!(ctype_alpha($s[$head]) || is_numeric($s[$head])) && $head < $tail)
            $head++;
        while (!(ctype_alpha($s[$tail]) || is_numeric($s[$tail])) && $head < $tail)
            $tail--;
        echo "$s[$head]  $s[$tail] \n";
        if ($s[$head] != $s[$tail])
            return false;
        $head++;
        $tail--;
    }
    return true;
}

function isPalindrome($s) {
    $s = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $s));
    return $s === strrev($s);
}

$s = "A man, a plan, a canal: Panama";
$s = "0P";
$s = "race a car";
var_dump(isPalindrome($s));
