<?php

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
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function buildTree($treeInput, $node = null, $i = 0, $nullOffset = 0) {
    if ($i < count($treeInput)) {
        if ($treeInput[$i] == null)
            $nullOffset++;
        $node = new TreeNode($treeInput[$i]);
        $node->left = buildTree($treeInput, $node->left, (2 * $i + 1) - (2 * $nullOffset), $nullOffset);
        $node->right = buildTree($treeInput, $node->right, (2 * $i + 2) - (2 * $nullOffset), $nullOffset);
    }
    return $node;
}
