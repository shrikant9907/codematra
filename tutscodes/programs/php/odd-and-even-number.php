<?php
/* 
* Simple PHP program to check the odd and even numbers | Site - codematra.com
*/

// Number
$number = 40;

// Check if reminder is Zero
if ($number%2 == 0) {    
    $type = "Even";
} else {
    $type = "Odd";
}

// Display the result:
echo 'Result: The number ' . $number .' is ' . $type;
?>