<?php
$n1 = rand(1, 6); //Generate First number between 1 and 6 
$n2 = rand(5, 9); //Generate Second number between 5 and 9 
$answer = $n1 + $n2;

$math = $n1 . " + " . $n2;
$_SESSION["vercode"] = $answer;

echo $math;
?>