<?php
session_start();
include("php/config.php");

//import php mailer classes 

// use LDAP\Result;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//load composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST["submit"])){

    $user_email=$_POST['email']; // Renamed variable to avoid conflict with PHPMailer object
    

    // Check if the email already exists in the database
    $email_check_query = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // If email exists
        //instantiation and passing true enables exceptions
        $mail = new PHPMailer(true); // Changed variable name to avoid conflict

        try{
            //enable verbose debug output;
            $mail->SMTPDebug = 2; //smtp::debug_server;

            //send using SMTP
            $mail->isSMTP();

            //set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';

            //enable SMTP authentication
            $mail->SMTPAuth = true;

            //SMTP username
            $mail->Username = 'dixitaundhad2021@gmail.com';

            //SMTP password
            $mail->Password = 'eqfk ifmn wvhs aqxq'; // Provide your Gmail app password here

            //enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            //TCP port to connect to, use 465 for 'phpmailer::encryption_ststtls' above
            $mail->Port = 587;

            //recipients
            $mail->setFrom('dixitaundhad2021@gmail.com', 'HealthIn.com');

            //add a recipient
            $mail->addAddress($user_email); // Use $user_email here

            //set email format to HTML
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email verification';
            $mail->Body = '<p> Your verification code is: <b style="font-size:30px;">' . $verification_code .'</b></p>';
            

            $mail->send();
            echo '<script>alert("code successfully send on your mail, please check your email..")</script>';

            // Update the row with the new verification code
            $update_query = "UPDATE users SET verification_code='$verification_code' WHERE email='$user_email'";
            mysqli_query($con, $update_query);

            header("Location: verification.php?email=" .$user_email);
            exit();
        } catch(Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else { // If email doesn't exist
        echo '<script>alert("Please enter valid registered email address..");</script>';
    }

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginsignup.css">
    <link rel="stylesheet" href="https://www.freepik.com/icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>forgot password</title>
    <style>
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
        .form-box{
            margin-top: 10px;
        }
        
    </style>
</head>
<body>

<div class="navigation">
    <a href="index.php" class="logo"><i class="fa-solid fa-heart-circle-plus"></i>&nbsp;HealthIn</a>
</div>
<form method="post">
<div class="container">
    <div class="box form-box">
        <header>Forgot Password</header>
        <form  method="post">
            <div class="field input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="enter valid email" autocomplete="off" required>
            </div>
            <div class="field">
                <input type="submit" class="btn" name="submit" value="Send Mail" required>
            </div>
        </form>
    </div>
</div>
</form>

 


</body>
</html>
