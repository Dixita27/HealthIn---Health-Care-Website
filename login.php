<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginsignup.css">
    <!-- <link rel="stylesheet" href="css/indexstyle.css"> -->
    <title>Login</title>

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
            
        }
        .form-box{
            margin-top: 10px;
        }
    </style>
    
</head>
<div class="navigation">
<a href="home.php" class="logo">HealthIn</a>

</div>
   
       
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $email=mysqli_real_escape_string($con,$_POST['email']);
                $password=mysqli_real_escape_string($con,$_POST['password']);

                $result=mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
                $row=mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid']=$row['Email'];
                    $_SESSION['username']=$row['Username'];
                    $_SESSION['age']=$row['Age'];
                    $_SESSION['id']=$row['Id'];
                }else{
                    echo "<div class='message'>
                     <p>Wrong Username Or Password</p>
                     </div><br>";

                     echo "<a href='login.php'><button class='btn'>Go Back</button>";
                }

                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
               }   else{

            


             ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="enter valid email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="enter valid password" autocomplete="off"  required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="signup.php">Sign Up Now</a><br>
                    <a href="forgot.php">forget password??</a>
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>