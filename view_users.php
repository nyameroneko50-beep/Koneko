<?php
include 'db_connect.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <style>
        body { background: #f3f7ff; font-family: Arial; padding: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; background: white; border-collapse: collapse; border-radius: 10px; overflow: hidden; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);}
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #6e87ff; color: white; }
        tr:hover { background: #f0f4ff; }
        .btn { padding: 6px 10px; border-radius: 5px; text-decoration: none; font-size: 14px; }
        .edit { background: #4caf50; color: white; }
        .delete { background: #e53935; color: white; }
        .back-btn { 
            display: block; 
            width: 200px; 
            margin: 20px auto 0; 
            padding: 10px; 
            background: #4a73d1; 
            color: white; 
            text-align: center; 
            border-radius: 6px; 
            text-decoration: none; 
            font-size: 16px; 
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Registered Users</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['fullname'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td>
            <a class="btn edit" href="edit_user.php?id=<?= $row['id'] ?>">Edit</a>
            <a class="btn delete" href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

<!-- Back to Registration Form button -->
<a href="index.html" class="back-btn">Back to Registration Form</a>

</body>
</html>
