<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Basic PHP validation
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Here you would typically insert the data into a database
        echo "Registration successful!";
        echo "<br>";
        echo "Name: " . htmlspecialchars($name);
        echo "<br>";
        echo "Email: " . htmlspecialchars($email);
    }
}
?>
