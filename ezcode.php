<?php

/*
Make testing easier
*/


function print_arr($arr, $expected) {
    $str = '';
    foreach ($arr as $num) {
        $str .= $num . ", ";
    }
    $str = trim($str, ", ");
    echo "Output: \t[$str]\nExpected: \t$expected\n";
}