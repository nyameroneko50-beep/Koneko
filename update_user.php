<?php
$host = "sql110.infinityfree.com";
$user = "if0_40563746";
$pass = "mOyAlhhHuQ";
$dbname = "if0_40563746_registration_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if(isset($_POST['update'])){

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
        <a href='view_users.php'><button>Back to View Users</button></a>
        <a href='index.html'><button>Back to Registration Form</button></a>
        ";
    } else {
        echo "Error updating record: " . $conn->error;
    }

} else {
    echo "<h2>No data received! Please submit the form.</h2>";
    echo "<a href='index.html'><button>Back to Registration Form</button></a>";
}

$conn->close();
?>
