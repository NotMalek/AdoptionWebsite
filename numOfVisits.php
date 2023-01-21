<?php
error_reporting (0);
$count = 1;
if (isset($_COOKIE['count'])){
    $count = $_COOKIE['count'];
    $count++;
}
if (isset($_COOKIE['lastVisit'])){
    $lastVisit = $_COOKIE['lastVisit'];
}

setcookie('count', $count, time()+3600);
setcookie('lastVisit', date("D-M-Y H:i:s T", time()+3600));

if($count==1){
    echo "Welcome to my webpage! It is your first time that you are here.";
}

else {
    echo "Hello, you have visited this webpage " . $count . " times.";
    echo '<br>';
    echo "The last time you visited my webpage was on: " . $lastVisit;
}

?>
