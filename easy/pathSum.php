<?php

/*
112. Path Sum - https://leetcode.com/problems/path-sum/

Given the root of a binary tree and an integer targetSum, return true if the tree has a 
root-to-leaf path such that adding up all the values along the path equals targetSum.

A leaf is a node with no children.

Example 1:
Input: root = [5,4,8,11,null,13,4,7,2,null,null,null,1], targetSum = 22
Output: true
*/

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

include_once("../binaryTree.php");

/**
 * @param TreeNode $root
 * @param Integer $targetSum
 * @return Boolean
 */
function hasPathSum($root, $targetSum) {
}

$treeInput = [5,4,8,11,null,13,4,7,2,null,null,null,1];
$root = buildTree($treeInput);
print_r($root);
$targetSum = 22;
var_dump(hasPathSum($root, $targetSum));
