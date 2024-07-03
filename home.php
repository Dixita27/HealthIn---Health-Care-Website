<?php
session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header(("Loctaion: login.php"));
    exit();
}
?>
<?php

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['Username'];
    $res_Email = $result['Email'];
    $res_Age = $result['Age'];
    $res_id = $result['Id'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthIn</title>

    <link rel="stylesheet" href="https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbjBmNVl5WnMzdW5hdndreGlMdkRiZktqZVZNQXxBQ3Jtc0ttRzRJRWMxSXhVOXpBb3Y1NS1PMF9CcndBODE2WEh0ZGZIMUpULUJEaGlRUkwzT0prcmphNzdtY3dvbjdLTU5VSV9hc1doM0dmaUttemllYjBZS19RUzk1d1dMc2liS29nWDV0YUl2TEZZdjBPV3FhTQ&q=https%3A%2F%2Fcdnjs.com%2Flibraries%2Ffont-awesome&v=m2Sz-43azgw">
    <link rel="stylesheet" href="css/indexstyle.css">
    <link rel="stylesheet" href="https://www.freepik.com/icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .active {
            text-decoration: underline;
            text-decoration: green;
        }

        :root {
            --green: #16a085;
            --black: #4444;
            --light-color: #777;
            --box-shadow: .5rem .5rem 0 rgba(22, 160, 133, .2);
            --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
            --border: .2rem solid 16a085;
        }


        h1 {
            font-size: 30px;
            font-weight: 20px;
            text-align: center;
        }




        @media(max-width:820px) {
            .slider {
                width: 600px;
                height: 375px;
            }
        }

        /* .slider .slides .info h1{
    font-size: 35px;
} */


        @media(max-width:620px) {
            .slider {
                width: 400px;
                height: 250px;
            }
        }

        /* .slider .slides .info{
    padding: 10px 20px;
}
    
.slider .slides .info h1{
    font-size: 30px;
} */


        @media(max-width:420px) {
            .slider {
                width: 320px;
                height: 200px;
            }
        }

        /* .slider .slides .info{
    padding: 5px 10px;
}
    
.slider .slides h1{
    font-size: 25px;
} */

        section {
            margin-top: 20px;
        }

        .doctors .heading {
            margin-bottom: 5px;
        }

        .doctors .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 3rem;
            margin-left: 20px;
            margin-right: 20px;
        }

        .doctors .box-container .box {
            text-align: center;
            background: white;
            border-radius: .5rem;
            border: 2px solid #16a085;
            box-shadow: var(--box-shadow);
            padding: 2rem;
        }

        /* .doctors .box-container .box :hover{
    transition: 0.5s;
    transform: scale(1.1);
} */
        .doctors .box-container .box img {
            height: 20rem;
            width: 20rem;
            border: 2px solid #16a085;
            border-radius: 10rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .doctors .box-container .box h3 a {
            color: black;
            font-size: 2.5rem;
        }

        .doctors .box-container .box h3 a:hover {
            color: black;
            font-size: 3rem;

        }

        .doctors .box-container .box span {
            color: var(--green);
            font-size: 1.7rem;
        }

        .doctors .box-container .box .share {
            padding-top: 2rem;
        }

        .doctors .box-container .box .share:hover {
            transition: 0.5s;
            transform: scale(1.1);
        }

        .doctors .box-container .box .share a {
            height: 5rem;
            width: 5rem;
            line-height: 4.5rem;
            font-size: 2rem;
            color: var(--green);
            border-radius: .5rem;
            border: 2px solid #16a085;
            margin: .3rem;
        }

        .doctors .box-container .box .share a:hover {
            background: var(--green);
            color: white;
            box-shadow: var(--box-shadow);
        }

        .review {
            background: #16a085;
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
        }

        .review .heading {
            color: black;
        }

        .review .box-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding-bottom: 5rem;
            background-color: #16a085;

        }

        .review .box-container .box {
            background: white;
            width: 30rem;
            margin: 5rem 2rem;
            padding: 1.5rem;
            position: relative;
        }

        .review .box-container .box img {
            position: absolute;
            bottom: -7.5rem;
            left: -2rem;
            height: 5rem;
            width: 5rem;
            border-radius: 50%;
            object-fit: cover;
        }

        .review .box-container .box p {
            font-size: 1.4rem;
            color: black;
        }

        .review .box-container .box h3 {
            text-align: end;
            color: black;
        }

        .review .box-container .box span {
            text-align: end;
            color: black;
            display: block;
            font-size: 1.5rem;
            font-weight: 200;
        }

        .review .box-container .box::before {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: .4rem;
            height: 2rem;
            width: 2rem;
            background: white;
            transition: rotate(45deg);
        }

        /* icon style */

        /* section:nth-child(even){
            background: #f5f5f5;
        } */
        .icons-container {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
            padding-top: 5rem;
            padding-bottom: 5rem;
            margin-left: 25px;
            margin-right: 25px;

        }

        .icons-container .icons {
            /* border: 2px solid #16a085; */
            /* box-shadow: var(--box-shadow); */
            /* border-radius: .5rem; */
            text-align: center;
            padding: 2.5rem;
        }

        .icons-container .icons i {
            font-size: 4.5rem;
            color: #16a085;
            padding-bottom: .7rem;
        }

        .icons-container .icons h3 {
            font-size: 4.5rem;
            color: black;
            padding-bottom: .5rem 0;

        }

        .icons-container .icons p {
            font-size: 1.7rem;
            color: var(--light-color);
            padding-bottom: .5rem 0;

        }

        .blog-post {
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            margin-top: 20px;
        }

        .blog-video {
            width: 40%;
            height: 190px;
            padding: 2px;
            margin-top: 10px;
        }

        .blog-video iframe {
            width: 130%;
            height: 130%;
            border: 2px solid black;
        }


        .blog-content {
            width: 70%;
            padding-left: 170px;
            box-sizing: border-box;
            margin-top: 80px;
        }

        .blog-title {
            font-size: 24px;
            margin-top: 0;
        }

        .blog-description {
            margin-top: 10px;
        }

        .blog-description p {
            font-size: 16px;
            line-height: 1.5;
        }

        .blog-content a:hover {
            color: black;
        }

        .scroll-top {
            cursor: pointer;
            text-align: center;
            font-size: 22px;
            position: fixed;
            width: 50px;
            height: 50px;
            line-height: 46px;
            bottom: 46px;
            right: 20px;
            color: #fff;
            opacity: 0.7;
            z-index: 9999;
            transition: all 0.3s;
            background: #16a085 !important;
            display: none;
            /* Initially hidden */
        }

        .error {
            color: red;
        }

        .book {
            background: #fff;
        }

        .book .row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10rem;
            background: #fff;
        }

        .book .row .image img {
            width: 95%;
            margin-left: 20px;
        }

        .book .row .image {
            width: 550px;
        }

        .book .row form {

            background: #fff;
            border: 2px solid #16a085;
            box-shadow: var(--box-shadow);
            text-align: left;
            padding: 2rem;
            border-radius: .5rem;
            width: 100px;
            margin-left: 100px;
            width: 400px;
        }

        .book .row form h3 {
            color: var(--black);
            padding-bottom: 1rem;
            font-size: 3rem;
        }

        .book .row form .box {
            width: 95%;
            margin: .7rem;
            border-radius: .5rem;
            border: 1.5px solid #16a085;
            font-size: 1.6rem;
            padding: .5rem;
        }

        .book .row form label {
            font-size: 15px;
            font-weight: bold;
        }

        .book .row form .btn {
            background: #fff;
            align-items: center;
            margin-left: 130px;
        }

        .book .row form .btn:hover {
            background: #16a085;
            color: #fff;
        }

        .searchbar {

            border: 2px solid #16a085;
            border-radius: 20px;
            padding: 5px;
            padding-left: 10px;
            width: 50%;
            align-items: center;
            margin: 20px;
            font-size: 20px;
            margin-left: 300px;

        }

        .search-button {
            border: 2px solid #16a085;
            height: 40px;
            width: 80px;
            align-items: center;
            font-size: 15px;
            border-radius: 20px;
        }

        .search-button:hover {
            background: #16a085;
            color: #fff;
        }

        /* Footer styles */
        footer {
            background-color: #f0f0f0;
            padding: 30px;
            font-size: 15px;
            margin-top: 20px;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-contact,
        .footer-links,
        .footer-social {
            margin-bottom: 10px;
        }

        .footer-contact h3,
        .footer-links h3,
        .footer-social h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer-contact p {
            margin-bottom: 5px;
            font-size: 15px;
        }

        .footer-links ul {
            list-style-type: none;

        }

        .footer-links ul li {
            margin-bottom: 5px;
        }

        .footer-links ul li a {
            color: #666;
            text-decoration: none;
        }

        .footer-social ul {
            list-style-type: none;
            display: flex;


        }

        .footer-social ul li {
            margin-right: 10px;
            padding-left: 12px;

        }


        .footer-social ul li:last-child {
            margin-right: 0;
        }

        .footer-social ul li a {
            color: #666;
            text-decoration: none;
            font-size: 18px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .footer-bottom p {
            color: #666
        }

        .footer-bottom ul {
            list-style-type: none;
        }

        .footer-bottom ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .footer-bottom ul li:last-child {
            margin-right: 0;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-circle-plus"></i>HealthIn</a>

        <div class="navbar">
            <a href="#mainhome">Home</a>
            <a href="#conditions">Conditions</a>
            <a href="#doctors">Doctors</a>
            <a href="#appointments">Appoinment</a>
            <a href="#review">Review</a>
            <a href="#blogs">blogs</a>
            <a href="edit.php">Change Profile</a>
        </div>

        <div id="menu-btn" class="fa-solid fa-bars"></div>

    </header>

    <section class="mainhome" id="mainhome" style="background: white;">
        <div class="image">
            <img src="images/index_background.gif" alt="">
        </div>

        <div class="content">

            <h3>stay safe, stay healthy</h3>
            <p>HealthIn provides progressive, and affordable healthcare, accessible on mobile and onnline for everyone.</p>


            <h2>
                <?php

                echo "WELCOME      ";
                echo  $res_Uname;
                ?>
            </h2>
        </div>
    </section>

    <h1 style="margin-top: 30px;">Conditions</h1>
    <section id="conditions">

        <form id="searchForm" onsubmit="event.preventDefault(); redirectToResults();">
            <h1>Disease Search</h1>
            <input type="text" id="searchInput" class="searchbar" name="searchInput" placeholder="Enter disease name">
            <button type="submit" name="search" class="search-button">Search</button>
        </form>

        <script>
            function redirectToResults() {
                let searchQuery = document.getElementById('searchInput').value;
                window.location.href = `api_search.html?search=${searchQuery}`;
            }
        </script>

    </section>


    <section class="doctors" id="doctors">
        <h1 class="heading">Our <span style="color: #16a085;">doctors</span></h1>

        <div class="box-container">
            <div class="box">
                <img src="https://doctor.myupchar.com/122560/profile.png" alt="">
                <h3><a href="Dr_Farhan.html">Dr. Farhan Shikoh</a></h3>
                <span>Cardiology</span><br>
                <span>11 years experience</span>
                <div class="share">
                    <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/FarhanShikoh?mibextid=ZbWKwL" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/cardiologistdrfarhanshikoh?igsh=MTIxd2hkMjZmeTM3cg==" class="fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/dr-md-farhan-shikoh-9637112a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="https://doctor.myupchar.com/122437/WhatsApp_Image_2023-12-15_at_6.46.10_PM-fotor-20231218115045.jpg" alt="">
                <h3><a href="Dr_Supriya.html">Dr. Supriya Shirish</a></h3>
                <span>Gastroentrology</span><br>
                <span>20 years experience</span>
                <div class="share">
                    <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/supriyashirishjugare?igsh=MTNtMHl2emtwMm94cQ==" class="fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/dr-supriya-shirish-19a1b4207?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="https://doctor.myupchar.com/122329/WhatsApp_Image_2023-11-09_at_12.20.58_PM-fotor-20231109165917.jpg" alt="">
                <h3><a href="Dr_Rajesh.html">Dr. Rajesh Ranjan</a></h3>
                <span>Gastroentrology</span><br>
                <span>22 years experience</span>

                <div class="share">
                    <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/supriyashirishjugare?igsh=MTNtMHl2emtwMm94cQ==" class="fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/dr-rajesh-ranjan-a3366b71?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="https://doctor.myupchar.com/122219/buhiuh.jpeg" alt="">
                <h3><a href="Dr_Dhamanjaya.html">Dr. Dhamanjaya D</a></h3>
                <span>Cardiology</span><br>
                <span>15 years experience</span>
                <div class="share">
                    <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/supriyashirishjugare?igsh=MTNtMHl2emtwMm94cQ==" class="fab fa-instagram"></a>
                    <a href="https://www.linkdin.com/" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="https://doctor.myupchar.com/122117/Capture-fotor-20231011105423.jpg" alt="">
                <h3><a href="Dr_Bajirao.html">Dr. Bajirao Malode</a></h3>
                <span>Dermatology</span><br>
                <span>13 years experience</span>
                <div class="share">
                    <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/supriyashirishjugare?igsh=MTNtMHl2emtwMm94cQ==" class="fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/dr-bajirao-malode-606a0074?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="https://doctor.myupchar.com/122147/WhatsApp_Image_2023-10-19_at_2.28.36_PM.jpeg" alt="">
                <h3><a href="Dr_Ankur.html">Dr. Ankur Gupta</a></h3>
                <span>Gastroenterology</span><br>
                <span>15 years experience</span>
                <div class="share">
                    <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/supriyashirishjugare?igsh=MTNtMHl2emtwMm94cQ==" class="fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/dr-ankur-gupta-47a27918?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fab fa-linkedin"></a>
                </div>
            </div>

        </div>
    </section>

    <!-- booking section start -->

    <?php

    // appointment booking code

    include("php/config.php");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile_no = $_POST['mobile_no'];
        $doctor = $_POST['doctor'];
        $appointmentDate = $_POST['appointmentDate'];
        $reason = $_POST['reason'];

        // SQL injection prevention: Use prepared statements
        $sql = "INSERT INTO appointment (Name, Email, Phone_No, Doctor, Date, Reason) 
            VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssss", $name, $email, $mobile_no, $doctor, $appointmentDate, $reason);

        // Execute the statement
        if ($stmt->execute()) {
            // Clear form fields
            $_POST = array();


            echo '<script>alert("Your appointment sucessfully booked");</script>';



            // Redirect to confirmation page using JavaScript
            echo '<script>window.location.href = "home.php?name=' . urlencode($name) . '&email=' . urlencode($email) . '&mobile_no=' . urlencode($mobile_no) . '&doctor=' . urlencode($doctor) . '&appointmentDate=' . urlencode($appointmentDate) . '&reason=' . urlencode($reason) . '";</script>';
            exit(); // Terminate script execution after redirection


        } else {
            // Error occurred while inserting data
            echo '<script>alert("Error booking appointment. Please try again later.");</script>';
        }

        // Close statement
        $stmt->close();
    }

    ?>



    <section class="book" id="appointments">
        <h1 class="heading"><span style="color: #16a085;">Book</span> Appointment</h1>
        <div class="row">


            <form id="appointmentForm" class="appointmentForm" method="POST" onsubmit="return validateForm()">
                <!-- Full Name -->
                <input type="text" id="fullName" name="name" required class="box" placeholder="Full Name">
                <span id="fullNameError" class="error"></span><br>

                <!-- Email -->
                <input type="email" id="email" name="email" required class="box" placeholder="Email">
                <span id="emailError" class="error"></span><br>

                <!-- Phone Number -->
                <input type="tel" id="phoneNumber" name="mobile_no" required class="box" placeholder="Phone Number">
                <span id="phoneNumberError" class="error"></span><br>

                <!-- Select Doctor -->
                <select id="doctor" name="doctor" required class="box">
                    <option value="">Select Doctor</option>
                    <option value="Dr. Farhan">Dr. Farhan</option>
                    <option value="Dr. Supriya">Dr. Supriya</option>
                    <option value="Dr. Dhamanjaya">Dr. Dhamanjaya</option>
                    <option value="Dr. Bajirao">Dr. Bajirao</option>
                    <option value="Dr. Ankur">Dr. Ankur</option>
                    <option value="Dr. Rajesh">Dr. Rajesh</option>
                </select>
                <span id="doctorError" class="error"></span><br>

                <!-- Appointment Date -->
                <input type="date" id="appointmentDate" name="appointmentDate" required class="box" placeholder="Appointment Date">
                <span id="appointmentDateError" class="error"></span><br>

                <!-- Reason for Appointment -->
                <textarea id="reason" name="reason" rows="4" cols="50" required class="box" placeholder="Reason for Appointment"></textarea>
                <span id="reasonError" class="error"></span><br>

                <!-- Submit Button -->
                <input type="submit" value="Book Now" class="btn" name="submit">
            </form>

            <div class="image">
                <img src="images/Online Doctor (1).gif" alt="">
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            let fullName = document.getElementById("fullName").value;
            let email = document.getElementById("email").value;
            let phoneNumber = document.getElementById("phoneNumber").value;
            let appointmentDate = document.getElementById("appointmentDate").value;
            let reason = document.getElementById("reason").value;
            let isValid = true;

            if (!fullName) {
                document.getElementById("fullNameError").textContent = "Please enter your full name";
                isValid = false;
            } else {
                document.getElementById("fullNameError").textContent = "";
            }

            if (!email) {
                document.getElementById("emailError").textContent = "Please enter your email";
                isValid = false;
            } else {
                document.getElementById("emailError").textContent = "";
            }

            // Simple phone number validation, can be improved for specific formats
            if (!phoneNumber || !phoneNumber.match(/^\d{10}$/)) {
                document.getElementById("phoneNumberError").textContent = "Please enter a valid phone number";
                isValid = false;
            } else {
                document.getElementById("phoneNumberError").textContent = "";
            }

            // Simple appointment date validation, can be improved
            if (!appointmentDate) {
                document.getElementById("appointmentDateError").textContent = "Please select an appointment date";
                isValid = false;
            } else {
                document.getElementById("appointmentDateError").textContent = "";
            }

            if (!reason) {
                document.getElementById("reasonError").textContent = "Please provide a reason for the appointment";
                isValid = false;
            } else {
                document.getElementById("reasonError").textContent = "";
            }

            return isValid;
        }
    </script>

    <!-- booking section end -->


    <!-- review section start -->
    <section class="review" id="review" style="margin-top: 50px;">
        <div class="container">
            <h1 class="heading"><span>'</span> People's Review <span>'</span></h1>
            <div class="box-container">
                <div class="box">
                    <p>Hello,,<br>
                        This is a very useful website, i found
                        very important and useful content and also
                        book appoinment with doctor very easily. <br>
                        thanks HealthIn
                    </p>
                    <h3>Nina Patel</h3>
                    <span>jan 5, 2021</span>
                    <img src="images/dt1.jpg" alt="">
                </div>

                <div class="box">
                    <p>Heyy,,<br>
                        I use this website since 2023,
                        i use this website for discover and gain knowledge
                        of diseas.i really like this.
                    </p><br><br>
                    <h3>Ankita Shah</h3>
                    <span>Apr 25, 2023</span>
                    <img src="images/dt2.jpg" alt="">
                </div>

                <div class="box">
                    <p>Hello,,<br>
                        Amazing Website, provide best information,
                        appointment system is best. <br><br>
                        thanks HealthIn
                    </p>
                    <h3>Aellex Dijango</h3>
                    <span>jan 20, 2022</span>
                    <img src="images/dt1.jpg" alt="">
                </div>
            </div>

        </div>

    </section>
    <!-- review section end -->

    <!-- icon  section start -->

    <section class="icons-container">
        <div class="icons">
            <i class="fa fa-user-md"></i>
            <h3>100+</h3>
            <p>doctors at work</p>
        </div>

        <div class="icons">
            <i class="fas fa-smile"></i>
            <h3>1000+</h3>
            <p>satisfied patients</p>
        </div>

        <div class="icons">
            <i class="fas fa-procedures"></i>
            <h3>2000+</h3>
            <p>active users</p>
        </div>

        <div class="icons">
            <i class="fas fa-users"></i>
            <h3>100+</h3>
            <p>contributers</p>
        </div>
    </section>

    <!-- icon section end -->

    <!-- blog section start -->
    <section id="blogs" style="margin-top: 50px;">
        <h1 class="heading">Our <span style="color: #16a085;">Blogs & Articals</span></h1>

        <div class="blog-post" style="background-color:#1111; height:285px;">
            <div class="blog-video" style="margin: 20px;;">
                <iframe width="760" height="100" src="https://www.youtube.com/embed/KazZpO7zbz0?si=r8bSzTrYk7nSV34R" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="blog-content">
                <h2 class="blog-title">World heart Day | Heart attack | Signs & symptoms (in hindi)</h2>
                <div class="blog-description">
                    <p>We have Dr Md. Farhan Shikoh, Consultant Cardiologist, Orchid Medical Centre to share everything you need to know for proper care of your heart. </p>
                </div>
                <a href="blogs.html">
                    <p style="text-align: end; font-size:20px; margin-top:30px; margin-right:10px; color:black">see more
                </a></p>
            </div>
        </div>
    </section>
    <!-- blog section end -->

    <div class="scroll-top" style="background-color: #16a085;">
        <i class="fa fa-angle-up"></i>
    </div>
    <script>
        // JavaScript for scroll-to-top functionality
        var scrollToTopBtn = document.querySelector(".scroll-top");

        window.addEventListener("scroll", function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        });

        scrollToTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"

            });
        });
    </script>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-contact">
                    <h3>Contact Us</h3>

                    <p>Phone: (123) 456-7890</p>
                    <p>Email: info@HealthIn.com</p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#mainhome">Home</a></li>
                        <li><a href="#conditions">Conditions</a></li>
                        <li><a href="#doctors">Doctors</a></li>
                        <li><a href="#appointments">Appointment</a></li>
                        <li><a href="#review">Review</a></li>
                        <li><a href="#blogs">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <h3>Connect With Us</h3>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 HealthIn Organization. All rights reserved.</p>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </footer>



    <script src="js/script.js"></script>

</body>

</html>