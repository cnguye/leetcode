<?php

/*
20. Valid Parenthesis - https://leetcode.com/problems/valid-parentheses/

Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

An input string is valid if:

    Open brackets must be closed by the same type of brackets.
    Open brackets must be closed in the correct order.

Example 1:

  Input: s = "()"
  Output: true

Example 2:

  Input: s = "()[]{}"
  Output: true

Example 3:

  Input: s = "(]"
  Output: false

Example 4:

  Input: s = "([)]"
  Output: false

Example 5:

  Input: s = "{[]}"
  Output: true


*/

function isValid($s) {
    $parenDict = [
        '(' => ')',
        '[' => ']',
        '{' => '}'
    ];
    $openCharStack = [];
    for($i = 0; $i < strlen($s); $i++){
        if(isset($parenDict[$s[$i]]))
            $openCharStack[] = $s[$i];
        else {
            if(!$openCharStack)
                return false;
            $openChar = array_pop($openCharStack);
            if($parenDict[$openChar] !== $s[$i])
                return false;
        }
    }
    if($openCharStack)
        return false;
    return true;
}
    
$s =  '[';
var_dump(isValid($s));
