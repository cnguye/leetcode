<?php

/*
1290. Convert Binary Number in a Linked List to Integer - https://leetcode.com/problems/convert-binary-number-in-a-linked-list-to-integer/

Given head which is a reference node to a singly-linked list. The value of each node in the linked list is either 0 or 1. The linked list holds the binary representation of a number.

Return the decimal value of the number in the linked list.

Example1:
Input: head = [1,0,1]
Output: 5
Explanation: (101) in base 2 = (5) in base 10

Example 2:
Input: head = [1,0,0,1,0,0,1,1,1,0,0,0,0,0,0]
Output: 18880
*/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */

 require_once("../singlyLinkedList.php");

 function getDecimalValue($head) {
    $val = 0;
    while(!is_null($head)){
        if(is_null($head->next)){
            if($head->val)
               $val++;
        }
        else
            $val += $head->val * 2 + $val;
        $head = $head->next;
    }
    return $val;
}

 $node0 = new ListNode(1);
 $node1 = new ListNode(0);
 $node2 = new ListNode(1);
 $node0->next = $node1;
 $node1->next = $node2;

 print_r(getDecimalValue($node0));