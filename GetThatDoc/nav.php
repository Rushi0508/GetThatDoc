<?php 
include './db_connect/config.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
</head>
<body>
<nav class="navbar h-nav">
        <div id="logo">
            <a href="home.php"><img src="./images/GetThatDoc.png" alt="Our logo"></a>
        </div>
        <ul class="nav-items v-class">
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="notes.php">Notes</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="buttons v-class">  
            <?php
              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                $user_display = $_SESSION['username'];
                echo '<div id="main-wpr">';
                echo '<i class="fa fa-user" aria-hidden="true"></i>';
                echo "<span>Welcome, $user_display</span>";
                echo '<div>';
                echo '<a href="logout.php"><button id="logout" >Log Out</button></a>';
                echo '<a href="viewuploads.php"><button id="myupload" >My Uploads</button></a>';
                echo '</div>';
                echo '</div>';
              }
              else{
                echo '<a href="login.php"><button id="login">Login</button></a>';
                echo ' <a href="signup.php"><button id="signup">Sign Up</button></a>';
              }
            ?>         
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    <script src="app.js"></script>
</body>
</html>