<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
    header(("Loctaion: login.php"));
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


   

</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-circle-plus"></i>HealthIn</a>
    </header>

    <section class="mainhome" id="mainhome" style="background-color: white;">
        <div class="image">
            <img src="images/index_background.gif" alt="">
        </div>

        <div class="content">
        
            <h3>stay safe, stay healthy</h3>
            <p>HealthIn provides progressive, and affordable healthcare, accessible on mobile and onnline for everyone.</p>
            <a href="signup.php" class="btn">connect now</a> 
            
        </div>
    </section>

 <!-- icon section start -->
 <section class="icons-container">
    <div class="icons">
       <i class="fa fa-user-md"></i>
       <h3>100+</h3>
       <p>doctors at work</p>
    </div>

    <div class="icons">
       <i class="fas fa-users"></i>
       <h3>1000+</h3>
       <p>satisfied patients</p>
    </div>

    <div class="icons">
       <i class="fas fa-users"></i>
       <h3>2000+</h3>
       <p>active users</p>
    </div>

    <div class="icons">
       <i class="fas fa-users"></i>
       <h3>100+</h3>
       <p>contributers</p>
    </div>
 </section>
    
    
    
    
    
    
    <link rel="stylesheet" href="js/script.js">
    
</body>
</html>