<?php
/* 
* Simple PHP program to calculate the circumference of a circle | Site - codematra.com
*/

// Define a constant PI
define('PI', '3.14');

// Variables
$radius = 5;

// Formula for circumference of circle is 2πr
$circumference = 2 * PI * $radius;

echo "The Circumference of circle is: $circumference";