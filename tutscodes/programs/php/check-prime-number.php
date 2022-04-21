<?php
/* 
* Simple PHP program to check prime number | Site - codematra.com
*/

// Number
$number = 138;
$isPrimeNumber = true;

// Using for loop
for ($n = 2; $n < $number; $n++) {
    if($number%$n == 0) {
        $isPrimeNumber = false;
        break;
    }
}

if ($isPrimeNumber) {
    echo "$number is prime number.";
} else {
    echo "$number is not a prime number.";
}    