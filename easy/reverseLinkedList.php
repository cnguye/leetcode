<?php

/*
206. Reverse Linked List - https://leetcode.com/problems/reverse-linked-list/

Given the head of a singly linked list, reverse the list, and return the reversed list.

Example 1:
Input: head = [1,2,3,4,5]
Output: [5,4,3,2,1]

Example 2:
Input: head = [1,2]
Output: [2,1]

Example 3:
Input: head = []
Output: []

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

include("../singlyLinkedList.php");

function reverseList($head) {
    $rHead = null;
    while (!is_null($head)) {
        $next = $head->next;
        $head->next = $rHead;
        $rHead = $head;
        $head = $next;
    }
    return $rHead;
}

$ll = buildSinglyLinkedList([1, 2, 3, 4, 5]);
// print_r($ll);
print_r(reverseList($ll));
