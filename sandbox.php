<?php

date_default_timezone_set('America/New_York');

$currentTime = time() - 28800;
$currentTime = date('D - M - Y H:i:s');
print_r($currentTime);