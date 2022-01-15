<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database="shopquanao";

// Create connection
$db = mysqli_connect($servername, $username, $password,$database);
mysqli_set_charset($db, 'UTF8');

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}



?>