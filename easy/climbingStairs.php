<?php

/*
70. Climbing Stairs - https://leetcode.com/problems/climbing-stairs/

You are climbing a staircase. It takes n steps to reach the top.

Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?
*/

function climbStairs($n) {
    $numWays = 0;
    return getClimbStairs($n, $numWays);
}

function getClimbStairs($n, &$numWays){
    $first = 0;
    $second = 1;
    $count = 0;
    for($i = 0; $i < $n; $i++){
        $count = $first + $second;
        $first = $second;
        $second = $count;
    }
    
    return $count;
}

$n = 6;
print_r(climbStairs($n));