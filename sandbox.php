<?php

$a = "hello a";
$b = "hello b";

function aa(){
    global $a, $b;
    echo "$a\n"; // outputs hello a
    $a = "bye a";
    $b = "bye b";
}

echo "$a\n";
echo "$b\n";
aa();
echo "$a\n";
echo "$b\n";
