<?php

function check($number){
	if($number % 2 == 0){
		echo "Even";
	}
	else{
		echo "Odd";
	}
}


$number = readline('Enter a number: ');
check($number)
?>
