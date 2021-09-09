<?php

/*
1089. Duplicate Zeros - https://leetcode.com/problems/duplicate-zeros/
Given a fixed length array arr of integers, duplicate each occurrence of zero, 
shifting the remaining elements to the right.

Note that elements beyond the length of the original array are not written.

Do the above modifications to the input array in place, do not return anything 
from your function.

Ex: 
Input: [1, 0, 2, 3, 0, 4, 5, 0]
Output: null
Explanation: After calling your function, the input array is modified to:
            [1, 0, 0, 2, 3, 0, 0, 4]
*/
function duplicateZeroes(&$arr) {
    $queue = new SplQueue();
    $countArr = count($arr);
    $foundZero = false;
    for ($i = 0; $i < $countArr; $i++) {
        if ($arr[$i] === 0 && !$foundZero && $queue->isEmpty()) {
            $foundZero = true;
        } elseif ($foundZero) {
            $queue->push($arr[$i]);
            $arr[$i] = 0;
            $foundZero = false;
        } else {
            if (!$queue->isEmpty()) {
                $queue->push($arr[$i]);
                $arr[$i] = $queue->shift();
                if ($arr[$i] === 0)
                    $foundZero = true;
            }
        }
    }
}

function print_arr($arr) {
    $str = '';
    foreach ($arr as $num) {
        $str .= $num . ", ";
    }
    $str = trim($str, ", ");
    echo "[ $str ]\n";
}

$arr = [1, 0, 0, 3, 0, 4, 5, 0];
echo "Input: \t\t";
print_arr($arr);
duplicateZeroes($arr);
echo "Output: \t";
print_arr($arr);
echo "Expected: \t[ 1, 0, 0, 0, 0. 3, 0, 0 ]\n";
