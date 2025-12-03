<?php
$host = "sql110.infinityfree.com";
$user = "if0_40563746";
$pass = "mOyAlhhHuQ";
$dbname = "if0_40563746_registration_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

$sql = "UPDATE users SET
        username='$username',
        fullname='$fullname',
        email='$email',
        phone='$phone',
        gender='$gender'
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {

    echo "
    <h2>User updated successfully!</h2>
    <a href='view_users.php'>Back to View Users</a><br><br>
    <a href='index.html'>Back to Registration Form</a>
    ";

} else {
    echo 'Error: ' . $conn->error;
}
?>
