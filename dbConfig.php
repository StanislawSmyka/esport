<?php

$dbHost = 'localhost';
$dbUsername = 'admin';
$dbPassword = 'pass';
$dbName = 'db';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>