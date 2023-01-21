<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>Uppercase first and last</h1>

<form method="get">
   Please type a sentence:  <input type="text" name="num1">
    <input type="submit">
</form>

<?php
error_reporting (0);
$string = $_GET["num1"];

function uppercase($input){
    $array = explode(' ', $input);
    foreach ($array as $word){
        $word = ucfirst($word);
        $word = ucfirst(strrev($word));
        $word = strrev($word);
        echo $word . " ";
    }
}

uppercase($string);
?>

<h1>Find average and median  </h1>

<form method="get">
    Please type a list of numbers:  <input type="text" name="num2">
    <input type="submit">
</form>

<?php

$array = explode(' ', $_GET["num2"]);

function avgAndMed(array $input){
    $avg = 0;
    $sum = 0;
    $med = 0;
    foreach ($input as $number){
        $sum = $number + $sum;
        $avg = $sum/count($input);
    }

    $count = count($input);
    $mid = floor(($count-1)/2);
    if($count % 2) { // odd number, middle is the median
        $med = $input[$mid];
    } else { // even number, calculate avg of 2 medians
        $low = $input[$mid];
        $high = $input[$mid+1];
        $med = (($low+$high)/2);
    }

    echo "The average is ". $avg . " and the median is ". $med;
}
avgAndMed($array);

?>

</body>
</html>