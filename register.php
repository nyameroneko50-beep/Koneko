<?php  
if ($_SERVER["REQUEST_METHOD"] === "POST") {  

    $fullname = trim($_POST["fullname"]);  
    $username = trim($_POST["username"]);  
    $email = trim($_POST["email"]);  
    $phone = trim($_POST["phone"]);
    $gender = $_POST["gender"];  
    $password = $_POST["password"];  

    echo "<div style='
    width:300px;
    margin:50px auto;
    padding:20px;
    background:#c7f9cc;
    border:2px solid #2d6a4f;
    border-radius:10px;
    text-align:center;
    font-family:Arial;'>

    <h2 style='color:#1b4332;'>Registration Successful!</h2>
    <p>Thank you for registering, <b>$fullname</b>.</p>
    <p>Your phone: <b>$phone</b></p>
    <a href='index.html'>Go back</a>
    </div>";
}
?>
