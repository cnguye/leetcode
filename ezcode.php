<?php

/*
Make testing easier
*/


function print_arr($arr, $expected = null) {
    $err = "print_arr requires argument 1 to be array of strings [arr] and argument 2 to be string [expected]\n";
    if (is_null($expected))
        echo $err;
    else {
        $str = '';
        foreach ($arr as $num) {
            if(is_array($num)){
                echo $err;
                break;
            }
            $str .= $num . ", ";
        }
        $str = trim($str, ", ");
        echo "Output: \t[$str]\nExpected: \t$expected\n";
    }
}
