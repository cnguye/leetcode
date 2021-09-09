<?php

/*
110. Balanced Binary Tree - https://leetcode.com/problems/balanced-binary-tree/

Given a binary tree, determine if it is height-balanced.

For this problem, a height-balanced binary tree is defined as:
- a binary tree in which the left and right subtrees of every node differ in height by no more than 1.

*/

require_once("../tree.php");

function isBalanced($root) {
    return getIsBalanced($root, 0, 0) !== false;    
}

function getIsBalanced($node, $currDepth){
    if(is_null($node))
        return $currDepth - 1;

    $maxLeft = getIsBalanced($node->left, $currDepth + 1);
    $maxRight = getIsBalanced($node->right, $currDepth + 1);

    if($maxLeft === false || $maxRight === false)
        return false;

    if(abs($maxLeft - $maxRight) > 1)
        return false;
    
    return $maxLeft > $maxRight ? $maxLeft : $maxRight;
}

// $node1 = new TreeNode(1);
// $node2 = new TreeNode(2);
// $node3 = new TreeNode(2);
// $node4 = new TreeNode(3);
// $node5 = new TreeNode(3);
// $node6 = new TreeNode(4);
// $node7 = new TreeNode(4);


// $node1->left = $node2;
// $node1->right = $node3;

// $node2->left = $node4;
// $node2->right = $node5;

// $node4->left = $node6;
// $node4->right = $node7;

// test 2
$node1 = new TreeNode(3);
$node2 = new TreeNode(9);
$node3 = new TreeNode(20);
$node4 = new TreeNode(15);
$node5 = new TreeNode(17);

$node1->left = $node2;
$node1->right = $node3;
$node3->left = $node4;
$node3->right = $node5;


$root = [3,9,20,null,null,15,7];
var_dump(isBalanced($node1));