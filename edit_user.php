<?php
$host = "sql110.infinityfree.com";
$user = "if0_40563746";
$pass = "mOyAlhhHuQ";
$dbname = "if0_40563746_registration_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Get User ID
$id = $_GET['id'];

// Fetch selected user
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
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
        input, select {
            width: 100%; padding: 8px;
            margin-bottom: 10px; border-radius: 6px;
            border: 1px solid #aaa;
        }
        button {
            width: 100%; padding: 10px;
            background: #4a73d1; border: none;
            color: white; border-radius: 6px;
            cursor: pointer;
        }
        a { display: block; text-align: center; margin-top: 10px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Edit User</h2>

    <form method="POST" action="update_user.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>">

        <label>Full Name</label>
        <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>">

        <label>Email</label>
        <input type="text" name="email" value="<?php echo $user['email']; ?>">

        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>">

        <label>Gender</label>
        <select name="gender">
            <option <?php if($user['gender']=="Male") echo "selected"; ?>>Male</option>
            <option <?php if($user['gender']=="Female") echo "selected"; ?>>Female</option>
            <option <?php if($user['gender']=="Other") echo "selected"; ?>>Other</option>
        </select>

        <button type="submit">Update</button>
    </form>

    <a href="view_users.php">Back</a>
</div>

</body>
</html>
