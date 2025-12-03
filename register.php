<?php

$host = "sql110.infinityfree.com";
$user = "if0_40563746";
$pass = "mOyAlhhHuQ";
$dbname = "if0_40563746_registration_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, fullname, email, phone, gender, password)
                        VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssss", $username, $fullname, $email, $phone, $gender, $hashed);

if ($stmt->execute()) {
    echo "Registration Successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
