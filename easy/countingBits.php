<?php

/*
338. Counting Bits - https://leetcode.com/problems/counting-bits/

Given an integer n, return an array ans of length n + 1 such that for each i (0 <= i <= n), 
ans[i] is the number of 1's in the binary representation of i.

Example 1:
Input: n = 2
Output: [0,1,1]
Explanation:
0 --> 0
1 --> 1
2 --> 10

Example 2:
Input: n = 5
Output: [0,1,1,2,1,2]
Explanation:
0 --> 0
1 --> 1
2 --> 10
3 --> 11
4 --> 100
5 --> 101

*/

require_once('../ezcode.php');

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBitsSlow($n) {
        $binRep = [];
        for ($i = 0; $i <= $n; $i++) {
            $num = $i;
            $numEven = $num % 2 == 0 ? true : false;
            $counter = 0;
            do {
                $num >>= 1;
                if ($counter > 4)
                    break;
                $counter++;
            } while (($num % 2) == 0);
            $countOnes = 0;
            while ($num > 0) {
                if ($num % 2 == 1)
                    $countOnes++;
                $num >>= 1;
            }
            $num += $countOnes;
            $num += $numEven ? 0 : 1;
            $binRep[$i] = $num;
        }
        return $binRep;
    }

    function countBits($n) {
        $binRep = [];
        for ($i = 0; $i <= $n; $i++) {
            $num = $i;
            $numEven = $num % 2 == 0 ? true : false;
            $counter = 0;
            do {
                $num >>= 1;
                if ($counter > 4)
                    break;
                $counter++;
            } while (($num % 2) == 0);
            $countOnes = 0;
            while ($num > 0) {
                if ($num % 2 == 1)
                    $countOnes++;
                $num >>= 1;
            }
            $num += $countOnes;
            $num += $numEven ? 0 : 1;
            $binRep[$i] = $num;
        }
        return $binRep;
    }
}

$ans = new Solution;
$n = 10;
$expected = '[0, 1, 1, 2, 1, 2, 2, 3, 1, 2, 2]';
print_arr($ans->countBits($n), $expected);
