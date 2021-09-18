<?php
/* 
* Simple PHP program to display items of an array of names | Site - codematra.com
*/

$names = array('Sona', 'Mona');

// Check if array has some items
if ($names) {

    // loop
    echo 'Names: <br />';
    foreach($names as $name) {
        echo $name . '<br />';
    }   
    
}