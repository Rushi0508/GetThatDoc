<?php 
include '../db_connect/config.php';
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
    <link rel="stylesheet" href="../css/nav.css">
    
    <title>Admin-Home | GetThatDoc</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="ho-style.css">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- to overlap materialize -->
<style>
    .fa{
        line-height: normal;
        height: 0%;
    }
    button{
        line-height: normal;
    }
</style>

</head>
<body>
<nav class="navbar h-nav">
        <div id="logo">
            <a href="home.php"><img src="../images/GetThatDoc.png" alt="Our logo"></a>
        </div>
        <ul class="nav-items v-class">
            <li><a href="home.php">Home</a></li>
            <li><a href="approved.php">Approved Notes</a></li>
            <li><a href="messages.php">Messages</a></li>
        </ul>
        <div class="buttons v-class">  
            <?php
              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                $user_display = $_SESSION['username'];
                echo '<div id="main-wpr">';
                echo '<i class="fa fa-user" aria-hidden="true"></i>';
                echo "<span>Welcome, $user_display</span>";
                echo '<div>';
                echo '<a href="../logout.php"><button id="logout" >Log Out</button></a>';
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
    <?php
    $sql = "SELECT * FROM contact ORDER by `ID` DESC"; 
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
?>
            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Messages</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">

                            <ul class="collapsible">

                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                        
                                ?>
                                <li id="s<?php echo $row['id']; ?>">
                                    <div class="collapsible-header">
                                        <?php echo $row['name']; ?>          
                                                                     
                                    </div>
                                    <div class="collapsible-body">
                                    Mobile: <a href="tel:<?php echo $row['mobile']; ?>"><?php echo $row['mobile']; ?></a><br>
                                    Email: <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a><br>
                                       Message: <?php echo nl2br($row['message']); ?>
                                    </div>
                                </li>

                                <?php
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <script src="../app.js"></script>
            <script>
                  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
            </script>
            

</body>
</html>