<?php

$host = "sql110.infinityfree.com";
$user = "if0_40563746";
$pass = "YOUR_VPANEL_PASSWORD_HERE"; 
$dbname = "if0_40563746_registration_db";

// Connect to database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$password = $_POST['password'];

// Insert into DB
$sql = "INSERT INTO users (username, fullname, email, phone, gender, password)
        VALUES ('$username', '$fullname', '$email', '$phone', '$gender', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration Successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>
