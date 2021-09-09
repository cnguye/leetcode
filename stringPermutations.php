<?php

/*
Seating Permutations - https://www.geeksforgeeks.org/write-a-c-program-to-print-all-permutations-of-a-given-string/
Difficulty: Medium

Write a program to print all permutations of a given string

A permutation, also called an “arrangement number” or “order,” is a rearrangement of the elements of an ordered 
list S into a one-to-one correspondence with S itself. A string of length n has n! permutation. 

Below are the permutations of string ABC. 
ABC ACB BAC BCA CBA CAB

*/

function seatingPermutations($students) {
    $studentPerms = [];
    getSeatingPermutations($students, $studentPerms, 0);
    return $studentPerms;
}

function getSeatingPermutations($students, &$studentPerms, $currIndex) {
    if($currIndex == count($students)){
        $studentPerms[] = $students;
        return;
    }
    for ($i = $currIndex; $i < count($students); $i++) {
        swap($students, $currIndex, $i);
        getSeatingPermutations($students, $studentPerms, $currIndex + 1);
        swap($students, $currIndex, $i);
    }
}

function swap(&$currPerm, $indexA, $indexB) {
    $temp = $currPerm[$indexA];
    $currPerm[$indexA] = $currPerm[$indexB];
    $currPerm[$indexB] = $temp;
    return $currPerm;
}

$students = ['Alfred', 'Bill', 'Cindy'];
print_r(seatingPermutations($students));
