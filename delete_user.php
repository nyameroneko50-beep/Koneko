<?php
$host = "sql110.infinityfree.com";
$user = "if0_40563746";
$pass = "mOyAlhhHuQ";
$dbname = "if0_40563746_registration_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User deleted successfully!'); window.location='view_users.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
