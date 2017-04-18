<?php

$db_username = 'test';
$db_password = 'pass';
$db_name = 'db';
$db_host = 'localhost';
$item_per_page = 5;


$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
?>