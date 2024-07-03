<?php
session_start();
include("php/config.php"); 

if (isset($_POST["verify"])) {
    $user_email = $_POST["email"];
    $verification_code = $_POST["verification_code"];
    
    // Connect to the database (replace with your database connection code)
    $con = mysqli_connect("localhost", "root", "", "Healthin");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Query to fetch the verification code from the database
    $query = "SELECT verification_code FROM users WHERE email = '$user_email'";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_verification_code = $row['verification_code'];
        
        // Compare the verification codes
        if ($verification_code == $db_verification_code) {
            // Verification code matched, perform further actions (e.g., redirect to reset.php)
            header("Location: reset.php?email=" .$user_email);
            exit();
        } else {
            // Verification code didn't match, display an error message
            echo "<p>**Verification code does not match. Please enter the correct verification code.</p>";
        }
    } else {
        // No user found with the provided email, or error in fetching data
        echo "<p>User with the provided email does not exist.</p>";
    }
    
    // Close the database connection
    mysqli_close($con);
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verification</title>
    <link rel="stylesheet" href="css/loginsignup.css">
    <link rel="stylesheet" href="https://www.freepik.com/icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
    body {
            background-color: #16a085;
            font-family: Arial, sans-serif;
        }
        .form {
            width: 400px;
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            margin: 10% auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 25px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
       
        
        .btn-wrap {
            text-align: center;
            margin-top: 15px;
        }
        .btn-wrap input[type="submit"] {
            padding: 10px 20px;
            background-color: rgba(76,182,68,0.808);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100px;
            height: 40px;
        }
        .btn-wrap input[type="submit"]:hover {
            opacity: 0.82;
        }
        .text {
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .text a {
            color: #007bff;
            text-decoration: none;
        }
        .entry{
            font-size: 23px;
            margin-left: 15px;
        }
        input{
            width: 170px;
            height: 25px;
        }
        p{
            color: #333;
            font-size: 20px;
            margin-left: 23%;
            margin-bottom: 100px;
        }
        .navigation{
            height: 50px;
            background-color: white;
            font-size: 20px;
            padding-top: 10px;
        }
        .navigation .logo{
            text-decoration: none;
            padding-left: 40px;
            text-align: center;
            color: #16a085;
        }
        .navigation .logo:hover{
            color: black;
        }
    </style>
</head>
<body bgcolor="#16a085">
<div class="navigation">
    <a href="index.php" class="logo"><i class="fa-solid fa-heart-circle-plus"></i>&nbsp;HealthIn</a>
</div>

    <form class="form" method="post">
        <div class="title">Verification</div>
        <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" required>
        <label for="verification" class="entry">enter code ::</label>
        <input type="text" name="verification_code" placeholder="enter verification code" required>
        
        <div class="btn-wrap">
        <input type="submit" name="verify" value="verify">
        </div>
        
        <div class="text" style="margin-top: 15px;">don't get code?,<a href="forgot.php">Resend</a></div>
         
        
    </form>
    
</body>
</html>
