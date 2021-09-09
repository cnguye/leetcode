<?php

/*
23. Merge k Sorted Lists - https://leetcode.com/problems/merge-k-sorted-lists/

You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.

Merge all the linked-lists into one sorted linked-list and return it.

Example 1:

Input: lists = [[1,4,5],[1,3,4],[2,6]]
Output: [1,1,2,3,4,4,5,6]
Explanation: The linked-lists are:
[
  1->4->5,
  1->3->4,
  2->6
]
merging them into one sorted list:
1->1->2->3->4->4->5->6

Example 2:

Input: lists = []
Output: []

Example 3:

Input: lists = [[]]
Output: []

*/

require_once('../singlyLinkedList.php');

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

function mergeKLists($lists) {
    $outputList = new ListNode();
    $outputListHead = $outputList;
    $currLowestNode = $lists[0];
    $listKey = 0;
    while ($lists) {
        foreach ($lists as $key => $listHead) {
            if (is_null($currLowestNode)) {
                $listKey = $key;
                $currLowestNode = $listHead;
            }
            if (is_null($listHead)) {
                unset($lists[$key]);
                if (empty($lists))
                    break 2;
            } elseif ($listHead->val < $currLowestNode->val) {
                $currLowestNode = $listHead;
                $listKey = $key;
            }
        }
        do {
            $tempNode = new ListNode($currLowestNode->val);
            $outputList->next = $tempNode;
            $outputList = $outputList->next;
            $currLowestNode = $currLowestNode->next;
        } while (!is_null($currLowestNode) && $currLowestNode->val == $outputList->val);

        if (!is_null($currLowestNode)) {
            $lists[$listKey] = $currLowestNode;
        } else {
            unset($lists[$listKey]);
        }
    }
    return $outputListHead->next;
}

$list1 = buildSinglyLinkedList([2, 2, 3, 4]);
$list2 = buildSinglyLinkedList([1, 1, 1, 3]);
$list3 = buildSinglyLinkedList([1, 2, 4, 4]);

print_r(mergeKLists([$list2, $list3, $list1]));
// mergeKLists([$list1, $list2, $list3]);
