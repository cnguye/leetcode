<?php

/*
21. Merge Two Sorted Lists - https://leetcode.com/problems/merge-two-sorted-lists/

Merge two sorted linked lists and return it as a sorted list. 
The list should be made by splicing together the nodes of the first two lists.

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

function mergeTwoLists($head1, $head2) {
    if (is_null($head1->val))
        return $head2;
    if (is_null($head2->val))
        return $head1;

    $head3 = new ListNode();
    $temp3 = $head3;
    while (!is_null($head1) && !is_null($head2)) {
        if ($head1->val < $head2->val) {
            $head3->next = new ListNode($head1->val);
            $head1 = $head1->next;
        } else {
            $head3->next = new ListNode($head2->val);
            $head2 = $head2->next;
        }
        $head3 = $head3->next;
    }
    if (!is_null($head1))
        $head3->next = $head1;
    if (!is_null($head2))
        $head3->next = $head2;
    return $temp3->next;
}

$lhead1 = buildSinglyLinkedList([1, 2, 4]);
$lhead2 = buildSinglyLinkedList([1, 3, 4]);
print_r(mergeTwoLists($lhead1, $lhead2));
