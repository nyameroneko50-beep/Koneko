<?php
include 'db_connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if($conn->query($sql) === TRUE){

        echo "
        <h2>User deleted successfully!</h2>
        <a href='view_users.php'>Back to View Users</a><br><br>
        <a href='index.html'>Back to Registration Form</a>
        ";

    } else {
        echo 'Error deleting record: ' . $conn->error;
    }

} else {
    echo 'No ID provided!';
}
?>
