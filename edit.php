<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/loginsignup.css">
    
 <title>Change Profile</title>

 <style>
    .navigation{
            height: 50px;
            background-color: white;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            
        }
        .navigation .logo{
            text-decoration: none;
            padding-left: 40px;
            text-align: center;
            padding-top: 10px;
            
        }
       .navigation .logout{
            text-decoration: none;
            padding-right: 40px;
            text-align: center;
            padding-top: 10px;
        
       }


 </style>
</head>

<div class="navigation">
<a href="home.php" class="logo">HealthIn</a>
        <a href="php/logout.php" class="logout">Log Out</a></div>

</div>
      
<body>
    
    <div class="container">
        <div class="box form-box">

        <?php

        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $age=$_POST['age'];
            
            $id=$_SESSION['id'];

            $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("Error Occurred");

            if($edit_query){
                echo "<div class='message'>
                <p>Profile Updated!</p>
                </div><br>";
        
                echo "<a href='home.php'><button class='btn'>Go Home</button>";
            }
        }else{

                $id = $_SESSION['id'];
                $query=mysqli_query($con,"SELECT * FROM users WHERE Id=$id");

                while($result=mysqli_fetch_assoc($query)){
                    $res_Uname=$result['Username'];
                    $res_Email=$result['Email'];
                    $res_Age=$result['Age'];

                }
            
        
        
        ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Name</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?> "autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>
               
                 <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                

            </form>
        </div>

        <?php } ?>
    </div>
    
</body>
</html>