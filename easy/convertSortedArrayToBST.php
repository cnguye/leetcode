<?php

/*
108. Convert Sorted Array to Binary Search Tree - https://leetcode.com/problems/convert-sorted-array-to-binary-search-tree/

Given an integer array nums where the elements are sorted in ascending order, 
convert it to a height-balanced binary search tree.

A height-balanced binary tree is a binary tree in which the depth of the two 
subtrees of every node never differs by more than one.

     0
    / \
  -3   9
  /   / 
-10  5

Input: nums = [-10,-3,0,5,9]
Output: [0,-3,9,-10,null,5]
Explanation: [0,-10,5,null,-3,null,9] is also accepted:
*/

require_once('../binaryTree.php');

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        return $this->genSortedArrayToBST($nums, 0, count($nums));
    }
    
    function genSortedArrayToBST($nums, $start, $end){
        if($start == $end)
            return;
        
        $rootIndex = floor(($start + $end) / 2);
        $rootNode = new TreeNode($nums[$rootIndex]);
        $rootNode->left = $this->genSortedArrayToBST($nums, $start, $rootIndex);
        $rootNode->right = $this->genSortedArrayToBST($nums, $rootIndex + 1, $end);
        
        return $rootNode;
    }
}
$nums = [-10,-3,0,5,9];
$nums = [1,3];
$ans = new Solution();

print_r($ans->sortedArrayToBST($nums));
