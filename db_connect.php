<?php
$host = "sql110.infinityfree.com"; 
$user = "if0_40563746";
$pass = "mOyAlhhHuQ"; 
$db   = "if0_40563746_registration_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
