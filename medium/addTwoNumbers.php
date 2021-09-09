<?php

/*
2. Add Two Numbers - https://leetcode.com/problems/add-two-numbers/

You are given two non-empty linked lists representing two non-negative integers.
The digits are stored in reverse order, and each of their nodes contains a single digit. 
Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

Example:
[2] -> [4] -> [3]
[5] -> [6] -> [4]

Input: l1 = [2,4,3], l2 = [5,6,4]
Output: [7,0,8]
Explanation: 342 + 465 = 807.
*/

/*
 Definition for a singly-linked list.
*/
class ListNode {
  public $val = 0;
  public $next = null;
  function __construct($val = 0, $next = null) {
    $this->val = $val;
    $this->next = $next;
  }
}

class Solution {
  function addTwoNumbers($l1, $l2) {
    $l1val = $l1->val;
    $l2val = $l2->val;
    $sum = $l1val + $l2val;
    $carryOver = 0;
  }
}

$list1node0 = new ListNode(2);
$list1node1 = new ListNode(4);
$list1node2 = new ListNode(3);
$list1node0->next = $list1node1;
$list1node1->next = $list1node2;

$list2node0 = new ListNode(5);
$list2node1 = new ListNode(6);
$list2node2 = new ListNode(4);
$list2node0->next = $list2node1;
$list2node1->next = $list2node2;

$solution = new Solution();
$solution->addTwoNumbers($list1node0, $list2node0);
