<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // simple check lang to make sure may laman
    $fullname = trim($_POST["fullname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $password = $_POST["password"];

    if ($fullname && $username && $email && $gender && $password) {
        echo "<div style='
            width: 320px;
            margin: 50px auto;
            padding: 20px;
            background: #c7f9cc;
            border: 2px solid #2d6a4f;
            border-radius: 12px;
            text-align: center;
            font-family: Arial;
        '>
        <h2 style='color:#1b4332;'>Registration Successful!</h2>
        <p>Thank you for registering, <b>$fullname</b>.</p>
        <a href='index.html' style='color:#1b4332;'>Go back</a>
        </div>";
    } else {
        echo "<p>Please fill out all fields.</p>";
    }
}
?>
