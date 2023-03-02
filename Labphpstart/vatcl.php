<?php


$myNumber = readline('Enter amount: ');
$percentToGet = 15;
$percentInDecimal = $percentToGet / 100;
$percent = $percentInDecimal * $myNumber;
echo $percent;