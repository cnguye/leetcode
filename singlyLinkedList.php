<?php

/**
 * Definition for a singly-linked list.
 * */

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function buildSinglyLinkedList($list) {
    $singlyLinkedList = new ListNode();
    $head = $singlyLinkedList;
    foreach($list as $listVal){
        $tempNode = new ListNode($listVal);
        $singlyLinkedList->next = $tempNode;
        $singlyLinkedList = $singlyLinkedList->next;
    }
    return $head->next;
}