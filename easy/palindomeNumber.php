<?php

/*
9. Palindrome Number - https://leetcode.com/problems/palindrome-number/

Given an integer x, return true if x is palindrome integer.

An integer is a palindrome when it reads the same backward as forward. 
For example, 121 is palindrome while 123 is not.

 */

function isPalindrome($x) {
  $x = (string)$x;
  $end = strlen(($x)) - 1;
  for($i = 0; $i < strlen($x)/2; $i++) {
      if($x[$i] !== $x[$end])
          return false;
      $end--;
  }
  return true;
}

$arr = 123021;
var_dump(isPalindrome($arr));