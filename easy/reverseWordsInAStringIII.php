<?php

/*
557. Reverse Words in a String III - 

Given
*/

function reverseWords($s) {
    $ss = $tempWord = '';

    for($i = strlen($s) - 1; $i >= 0; $i--){
        if($s[$i] == ' '){
            $ss = $tempWord . ' ' . $ss;
            $tempWord = '';

        }
        else
            $tempWord .= $s[$i];
    }
    return trim($tempWord . ' ' . $ss);
}

$s = "Let's take LeetCode contest";
print_r(reverseWords($s));