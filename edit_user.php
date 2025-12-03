<?php
include 'db_connect.php';

// Update logic
if(isset($_POST['id'])){
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

    if($conn->query($sql) === TRUE){
        // Alert and automatically go back to registration form
        echo "<script>
                alert('User updated successfully!');
                window.location='index.html';
              </script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch user data for form
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_assoc();
} else {
    echo "No ID provided!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body { font-family: Arial; background: #eef2ff; }
        .card {
            width: 350px; margin: auto; margin-top: 40px;
            padding: 20px; background: white;
            border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        input, select { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 6px; border: 1px solid #aaa; }
        button { width: 100%; padding: 10px; background: #4a73d1; border: none; color: white; border-radius: 6px; cursor: pointer; }
        a { display: block; text-align: center; margin-top: 10px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Edit User</h2>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label>Username</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required>

        <label>Full Name</label>
        <input type="text" name="fullname" value="<?= $user['fullname'] ?>" required>

        <label>Email</label>
        <input type="text" name="email" value="<?= $user['email'] ?>" required>

        <label>Phone</label>
        <input type="text" name="phone" value="<?= $user['phone'] ?>" required>

        <label>Gender</label>
        <select name="gender" required>
            <option <?= $user['gender']=="Male" ? "selected" : "" ?>>Male</option>
            <option <?= $user['gender']=="Female" ? "selected" : "" ?>>Female</option>
            <option <?= $user['gender']=="Other" ? "selected" : "" ?>>Other</option>
        </select>

        <button type="submit">Update</button>
    </form>

    <a href="index.html">Back to Registration Form</a>
    <a href="view_users.php">Back to Users List</a>
</div>

</body>
</html>
