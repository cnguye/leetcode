<?php

/*
36. Valid Sudoku - https://leetcode.com/problems/valid-sudoku/

Determine if a 9 x 9 Sudoku board is valid. Only the filled cells need to be validated according to the following rules:

    Each row must contain the digits 1-9 without repetition.
    Each column must contain the digits 1-9 without repetition.
    Each of the nine 3 x 3 sub-boxes of the grid must contain the digits 1-9 without repetition.

Note:

    A Sudoku board (partially filled) could be valid but is not necessarily solvable.
    Only the filled cells need to be validated according to the mentioned rules.

*/

function isValidSudoku(&$input) {
    $row = 0;
    $col = 0;
    $isCellBlank = false;
    // verify if sudoku is already solved and if not solved, get next "blank" space position  
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            if ($input[$row][$col] == 0) {
                $isCellBlank = true;
                break;
            }
        }
        if ($isCellBlank)
            break;
    }
    // no more "blank" spaces means the puzzle is solved
    if (!$isCellBlank)
        return true;

    // try to fill "blank" space with correct num
    for($num = 1; $num <= 9; $num++) {
        // isValidCell checks that num isn't already present in the row, column, or 3x3 box
        if(isValidCell($input, $row, $col, $num)){
            $input[$row][$col] = $num;

            if(isValidSudoku($input)) {
                return true;
            }

            // if num is placed in incorrect position, mark as "blank" again then backtrack
            // with a different num
            $input[$row][$col] = 0;
        }
    }
    return false;
}

// check if number is valid
function isValidCell($input, $row, $col, $num) {
    // check row
    if (in_array($num, $input[$row]))
        return false;

    // check col
    foreach ($input as $input_row) {
        if ($input_row[$col] == $num)
            return false;
    }
    // check 3x3 block
    $row_offset = abs($row - ($row % 3));
    $col_offset = abs($col - ($col % 3));
    for ($k = $row_offset; $k < ($row_offset + 3); $k++) {
        for ($i = $col_offset; $i < ($col_offset + 3); $i++) {
            if ($input[$k][$i] == $num)
                return false;
        }
    }
    // return true if never false
    return true;
}

function printSudoku($input){
    $strBuilder = "";
    for($i = 0; $i < 9; $i++){
        $rowBuilder = "";
        for($k = 0; $k < 9; $k++){
            $rowBuilder .= $input[$i][$k]. "  ";
        }

        $strBuilder .= $rowBuilder . "\n";
    }
    print_r($strBuilder);
}

$input = [
    [5, 3, 0, 0, 7, 0, 0, 0, 0], 
    [6, 0, 0, 1, 9, 5, 0, 0, 0],
    [0, 9, 8, 0, 0, 0, 0, 6, 0],
    [8, 0, 0, 0, 6, 0, 0, 0, 3],
    [4, 0, 0, 8, 0, 3, 0, 0, 1],
    [7, 0, 0, 0, 2, 0, 0, 0, 6],
    [0, 6, 0, 0, 0, 0, 2, 8, 0],
    [0, 0, 0, 4, 1, 9, 0, 0, 5],
    [0, 0, 0, 0, 8, 0, 0, 7, 9]
];

$output = true;
var_dump(isValidSudoku($input));
printSudoku($input);
print_r("expected: $output\n");
