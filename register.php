<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $user = htmlspecialchars($_POST['username']);
    $id = htmlspecialchars($_POST['studentid']);
    $course = htmlspecialchars($_POST['course']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Complete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Registration Complete</h2>

    <p><b>Name:</b> <?= $name ?></p>
    <p><b>Email:</b> <?= $email ?></p>
    <p><b>Username:</b> <?= $user ?></p>
    <p><b>Student ID:</b> <?= $id ?></p>
    <p><b>Course:</b> <?= $course ?></p>
</div>

</body>
</html>
