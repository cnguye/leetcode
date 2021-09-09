<?php

/*
Palindrome II - https://leetcode.com/problems/valid-palindrome-ii/submissions/

Given a string s, return true if the s can be palindrome after deleting at most one character from it.

Test cases:

"tcaac"
"caaasaac"
"atbbga"
"cbbcc"
"aguokepatgbnvfqmgmlcupuufxoohdfpgjdmysgvhmvffcnqxjjxqncffvmhvgsymdjgpfdhooxfuupuculmgmqfvnbgtapekouga"
"ebcbbececabbacecbbcbe"

*/

function validPalindrome($s) {
    $back = strlen($s) - 1;
    $front = 0;
    do {
        if ($s[$front] !== $s[$back]) {
            return (isValidPalindrome($s, $front, $back - 1) || isValidPalindrome($s, $front + 1, $back));
        } else {
            $front++;
            $back--;
        }
    } while ($front < $back);
    return true;
}

function isValidPalindrome($s, $front, $back) {
    do {
        if ($s[$front] !== $s[$back]) {
            return false;
        } else {
            $front++;
            $back--;
        }
    } while ($front < $back);
    return true;
}

$testCases = [
    "tcaac",
    "caasebaac",
    "atbbga",
    "cbbcc",
    "ececcec",
    "aguokepatgbnvfqmgmlcupuufxoohdfpgjdmysgvhmvffcnqxjjxqncffvmhvgsymdjgpfdhooxfuupuculmgmqfvnbgtapekouga",
    "ebcbbececabbacecbbcbe"
];
foreach ($testCases as $testCase) {
    var_dump(validPalindrome($testCase));
}
