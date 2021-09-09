<?php

/*
101. Symmetric Tree - https://leetcode.com/problems/symmetric-tree/

Given the root of a binary tree, check whether it is a mirror of itself 
(i.e., symmetric around its center).

Example 1:
Input: root = [1,2,2,3,4,4,3]
Output: true
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

function isSymmetric($root) {
    if(is_null($root->left) && is_null($root->right))
        return true;
    if(is_null($root->left)  ^ is_null($root->right))
        return false;
    
    return checkMirror($root->left, $root->right);
    
}

function checkMirror($currLeft, $currRight){
    if(is_null($currLeft) && is_null($currRight))
        return true;
    if(is_null($currLeft) ^ is_null($currRight))
        return false;
    if($currLeft->val != $currRight->val)
        return false;
    return ( checkMirror($currLeft->left, $currRight->right) && checkMirror($currLeft->right, $currRight->left) );
}

$input = [1, 2, 2, 3, 4, 4, 3];
$input = [1,2,2,2,null,2];

$root = buildTree($input);
print_r($root);
var_dump(isSymmetric($root));
