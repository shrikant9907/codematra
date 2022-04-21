<?php 
/*
* Connect with Database | Site - codematra.com
*/

$database = mysqli_select_db($connection, $databasename);  
if(!$database) {
    die('Unable to connect with Database.');
} 
?>