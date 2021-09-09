<?php

/*
1302. Deepest Leaves Sum - https://leetcode.com/problems/deepest-leaves-sum/

Given the root of a binary tree, return the sum of values of its deepest leaves. 

Example 1:

      1
     / \
    2   3
   / \   \
  4   5   6
       \   \
        7   8

Input: root = [1,2,3,4,5,null,6,7,null,null,null,null,8]
Output: 15

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

require_once('../binaryTree.php');

function deepestLeavesSum($root) {
    $currLevel = $maxLevel = $currSum = 0;
    return getDeepestLeavesSum($root, $currSum, $currLevel, $maxLevel);
}

function getDeepestLeavesSum($currNode, &$currSum, $currLevel, &$maxLevel) {
    if (is_null($currNode->left) && is_null($currNode->right) && $currLevel == $maxLevel) {
        echo "Hi $currNode->val\n";
        return $currSum + $currNode->val;
    }
    $maxLevel = $currLevel + 1;
    echo "maxLevel: $maxLevel \n";
    $leftMax = $rightMax = 0;

    if (!is_null($currNode->left))
        $leftMax = getDeepestLeavesSum($currNode->left, $currSum, $currLevel + 1, $maxLevel);
    if (!is_null($currNode->right))
        $rightMax = getDeepestLeavesSum($currNode->right, $currSum, $currLevel + 1, $maxLevel);

    echo "leftMax: $leftMax rightMax: $rightMax \n";
    if($maxLevel == $currLevel)
        $currSum = $leftMax + $rightMax;
    return $currSum;
}

function deepestLeavesSum_old($root) {
    $currLevel = 0;
    return getDeepestLeavesSum_old($root, 0, 0, $currLevel)[0];
}

function getDeepestLeavesSum_old($currNode, $currMax, $currSum, $currLevel) {
    if (is_null($currNode->left) && is_null($currNode->right))
        return [$currSum + $currNode->val, $currLevel];

    $leftMax = $rightMax = null;
    if (!is_null($currNode->left))
        $leftMax = getDeepestLeavesSum_old($currNode->left, $currMax + 1, $currSum, $currLevel + 1);
    if (!is_null($currNode->right))
        $rightMax = getDeepestLeavesSum_old($currNode->right, $currMax + 1, $currSum, $currLevel + 1);


    if (!is_null($leftMax) && !is_null($rightMax)) {
        if ($rightMax[1] < $leftMax[1])
            return $leftMax;
        if ($rightMax[1] > $leftMax[1])
            return $rightMax;
        if ($rightMax[1] == $leftMax[1])
            return [$rightMax[0] + $leftMax[0], $rightMax[1]];
    }
    if (!is_null($rightMax)) {
        return $rightMax;
    }
    if (!is_null($leftMax)) {
        return $leftMax;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);
$node6 = new TreeNode(6);
$node7 = new TreeNode(7);
$node8 = new TreeNode(8);
$node9 = new TreeNode(9);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;

$node3->right = $node6;

$node5->right = $node7;

$node6->right = $node8;

print_r(deepestLeavesSum($node1));
