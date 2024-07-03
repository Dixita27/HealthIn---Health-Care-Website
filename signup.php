<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginsignup.css">
    <title>Sign Up</title>

    <style>
        .navigation {
            height: 50px;
            background-color: white;
            font-size: 20px;
            padding-top: 10px;
        }

        .navigation .logo {
            text-decoration: none;
            padding-left: 40px;
            text-align: center;
        }

        .box {
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <div class="navigation">
        <a href="home.php" class="logo">HealthIn</a>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                <p>This Email is used, Try another One Please!</p>
                </div><br>";

                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occurred");

                    echo "<div class='message'>
                <p>Registration Successful!</p>
                </div><br>";

                    echo "<a href='login.php'><button class='btn'>Login Now</button>";
                }
            } else {
            ?>
                <header>Sign Up</header>
                <form action="" method="post" id="form" name="Formfill" onsubmit="return validation()">
                    <div class="field input">
                        <label for="username">Name</label>
                        <input type="text" name="username" id="username" placeholder="Enter name" required>
                    </div>
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Enter email" required>
                    </div>
                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" autocomplete="off" placeholder="Enter age" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter password" required>
                    </div>
                    <div class="field input">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" autocomplete="off" placeholder="Confirm password" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register">
                    </div>
                    <div class="links">
                        Already have an account? <a href="login.php">Sign In</a>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>

    <script>
        function validation() {
            var uname = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var cpassword = document.getElementById("cpassword").value;
            var email = document.getElementById("email").value;
            var atposition = email.indexOf("@");
            var dotposition = email.lastIndexOf(".");

            if (uname == "" || email == "" || password == "") {
                alert("Please enter all values...");
                return false;
            }
            if (password.length < 6) {
                alert("Password must be at least 6 characters long....");
                return false;
            }
            if (password !== cpassword) {
                alert("Passwords must be same..");
                return false;
            }
            if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
                alert("Please enter a valid email address (e.g., abc@xyz.com...)");
                return false;
            } else {
                alert("Registration successful");
            }
        }
    </script>
</body>

</html>