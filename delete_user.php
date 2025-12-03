<?php
include 'db_connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if($conn->query($sql) === TRUE){
        echo "
        <h2>User deleted successfully!</h2>
        <a href='view_users.php'><button>Back to View Users</button></a>
        <a href='index.html'><button>Back to Registration Form</button></a>
        ";
    } else {
        echo 'Error deleting record: ' . $conn->error;
    }
} else {
    echo 'No ID provided!';
}
?>
