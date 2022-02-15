<?php

/*
500. Keyboard Row - https://leetcode.com/problems/keyboard-row/

Given an array of strings words, return the words that can be typed using 
letters of the alphabet on only one row of American keyboard like the image 
below.

In the American keyboard:

    the first row consists of the characters "qwertyuiop",
    the second row consists of the characters "asdfghjkl", and
    the third row consists of the characters "zxcvbnm".

Example 1:
Input: words = ["Hello","Alaska","Dad","Peace"]
Output: ["Alaska","Dad"]

Example 2:
Input: words = ["omk"]
Output: []

Example 3:
Input: words = ["adsdf","sfd"]
Output: ["adsdf","sfd"]

*/

function findWords($words) {
    $rows = [str_split("qwertyuiop"), str_split("asdfghjkl"), str_split("zxcvbnm")];
    $foundWords = [];
    foreach ($words as $word) {
        $found = true;
        $chars = str_split(strtolower($word));
        $rowIndex = 0;
        for ($i = 0; $i < count($chars); $i++) {
            $char = $chars[$i];
            if (!in_array($char, $rows[$rowIndex])) {
                $i = -1;
                $rowIndex++;
                if ($rowIndex > 2) {
                    $found = false;
                    break;
                }
            }
        }
        if($found)
            $foundWords[] = $word;
    }
    return $foundWords;
}

$words = ["Hello", "Alaska", "Dad", "Peace"];
print_r(findWords($words));
