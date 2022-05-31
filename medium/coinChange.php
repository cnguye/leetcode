<?php

/*
322. Coin Change - https://leetcode.com/problems/coin-change/

You are given an integer array coins representing coins of different denominations and an integer amount representing a total amount of money.
Return the fewest number of coins that you need to make up that amount. If that amount of money cannot be made up by any combination of the coins, return -1.
You may assume that you have an infinite number of each kind of coin.
 

Example 1:
Input: coins = [1,2,5], amount = 11
Output: 3
Explanation: 11 = 5 + 5 + 1

Example 2:
Input: coins = [2], amount = 3
Output: -1

Example 3:
Input: coins = [1], amount = 0
Output: 0

*/

function coinChange1($coins, $amount) {
    $numCoins = 0;
    $sum = $amount;
    for ($i = 0; $i < count($coins); $i++) {
    }

    return $numCoins;
}

function coinChange($coins, $amount) {
    $dp = array_fill(0, $amount + 1, $amount + 1);
    $dp[0] = 0;

    for ($i = 0; $i < $amount + 1; $i++) {
        foreach($coins as $coin) {
            if($i - $coin >= 0){
                $dp[$i] = min($dp[$i], 1 + $dp[$i - $coin]);
            }
        }
    }

    return $dp[$amount] === $amount + 1 ? -1 : $dp[$amount];
}

$coins = [2];
$coins = [1, 2, 3, 5];
$coins = [2, 5];
$coins = [186, 419, 83, 408];
$coins = [1, 2, 5];

$amount = 3;
$amount = 4;
$amount = 11;
$amount = 0;
$amount = 6249; // 20
$amount = 13; // 4
print_r(coinChange($coins, $amount));
