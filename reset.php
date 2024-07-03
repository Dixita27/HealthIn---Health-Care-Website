<?php
session_start();
include("php/config.php");

if (isset($_POST["submit"])) { // Change to "submit" instead of "submit"
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } elseif (strlen($password) < 6) { // Check if password length is less than 6 characters
        echo "<script>alert('Password must be at least 6 characters long.');</script>";
    }
    else {
        // Update the password in the database (store as plain text)
        $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            echo "<script>alert('Password reset successfully.You can login now with new password.');</script>";
             // Redirect to login.php
             header("Location: login.php");
             exit();
            
        } else {
            echo "<script>alert('Error resetting password. please try again later..');</script>";
            header("Location: reset.php?email=" .$user_email);
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/loginsignup.css">
    <link rel="stylesheet" href="https://www.freepik.com/icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>
        .form-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: flex;
            width: 100%;
            background-color: #16a085;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            justify-content: center;
            font-size: 20px;
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

    <div class="form-container">
        <h2>Reset Password</h2>
        <form action="reset.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : (isset($_GET['email']) ? $_GET['email'] : ''); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn" name="submit">Reset Password</button>
        </form>
    </div>

</body>
</html>
