<?php

/*
N-Queens - https://leetcode.com/problems/n-queens/

The n-queens puzzle is the problem of placing n queens on an n x n chessboard such that no two queens attack each other.

Given an integer n, return all distinct solutions to the n-queens puzzle. You may return the answer in any order.

Each solution contains a distinct board configuration of the n-queens' placement, where 'Q' and '.' both indicate a queen and an empty space, respectively.
 */

function nQueens($n) {
    $chessRow = array_fill(0, $n, '.');
    $chessBoard = array_fill(0, $n, $chessRow);
    $result = getNQueens($chessBoard, $n, 0, 0);
    return $result ? $chessBoard : 0;
}

function getNQueens(&$currChessBoard, $n, $row, $col) {
    if ($row >= $n) 
        return true;
    for ($currCol = 0; $currCol < $n; $currCol++) {
        if (isValidQueen($currChessBoard, $row, $currCol)) {
            $currChessBoard[$row][$currCol] = 'Q';
            if (getNQueens($currChessBoard, $n, $row + 1, $currCol)) {
                return true;
            }
        }
        $currChessBoard[$row][$currCol] = '.';
    }
    return false;
}

function isValidQueen($chessBoard, $row, $col) {
    // check row
    if (in_array('Q', $chessBoard[$row]))
        return false;

    // check columns
    foreach ($chessBoard as $chessBoardRow) {
        if ($chessBoardRow[$col] === 'Q')
            return false;
    }

    // check diagonals
    foreach ($chessBoard as $rowNum => $rowVals) {
        $spacer = abs($row - $rowNum);
        $leftSide = $col - $spacer;
        $rightSide = $col + $spacer;
        // check left side
        if ($leftSide >= 0) // don't need to check out of bounds index
            if ($chessBoard[$rowNum][$leftSide] === 'Q')
                return false;
        // check right side
        if ($rightSide < count($chessBoard)) // don't need to check out of bounds index
            if ($chessBoard[$rowNum][$rightSide] === 'Q')
                return false;
    }

    return true;
}

function print_arr($chessBoard) {
    if (!$chessBoard)
        echo "False from print_arr\n";
    else {
        $board = '';
        foreach ($chessBoard as $chessBoardRow) {
            $row = '';
            foreach ($chessBoardRow as $square) {
                $row .= $square . " ";
            }
            $row = trim($row) . "\n";
            $board .= $row;
        }
        echo $board;
    }
}

$n = 4;
print_arr(nQueens($n));
