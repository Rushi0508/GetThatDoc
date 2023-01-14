<?php 
include '../db_connect/config.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
  function filterStringBasic($string){
    return trim(addslashes(htmlspecialchars($string)));
    }
  if(isset($_GET['q'])){
    $id = filterStringBasic($_GET['q']);
    }else{
    header("Location: ./home.php");
    }

    $sql ="SELECT * FROM fileupload WHERE `id`=$id";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    
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
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
    </script>
<!-- to overlap materialize -->
<style>
    .fa{
        line-height: normal;
        height: 0%;
    }
    button{
        line-height: normal;
    }
    .note-name{
        color: black;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: lighter;
    }
    .name{
        display: flex;
        justify-content: center;
    }
    
    p{
        margin-bottom: 0.5rem;
    }
    .row{
        margin-bottom: 10px;
    }
    .delete{
        background-color: #ee6e73;
    }
    #edit-form button{
        padding: 10px;
        border-radius: 10px;
        background-color: #2bbbad;
        border: 1px solid;
        cursor: pointer;
        color: white;
    }
    #edit-form button:hover{
        background-color: white;
        color: #2bbbad;
        border: 2px solid #2bbbad;
    }
</style>
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
                echo '<a href="../viewuploads.php"><button id="myupload" >My Uploads</button></a>';
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
<section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Edit Product</h4>
                        </div>
                    </div>

                    <form id="edit-form" method="POST" action="edit-manage.php?q=<?php echo $row['id']?>" enctype="multipart/form-data"">

                    <div class="row">                        
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="title" type="text" name="title" value="<?php echo $row['title']; ?>" required>
                            <label for="title">Notes Name*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="downloads" type="text" name="downloads" value="<?php echo $row['downloads']; ?>" required>
                            <label for="downloads">Downloads*</label>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="fname" type="text" name="fname" value="<?php echo $row['fname']; ?>" required>
                            <label for="fname">First Name*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="lname" type="text" name="lname" value="<?php echo $row['lname']; ?>" required>
                            <label for="lname">Last Name*</label>
                        </div>    
                    </div>
                    <button type="submit">Submit</button>
                    </form>
            </section>
            <script src="../app.js"></script>
</body>
</html>

<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $downloads = $_POST["downloads"];
    $title = $_POST["title"];
    $sql = "UPDATE fileupload SET fname=$fname, lname = $lname, title=$title,downloads=$downloads WHERE id = $id";
    $result = mysqli_query($link, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($result){
        echo '<script>confirm("Notes Successfully Edited");
        window.location.href="./approved.php"; 
        </script>';
    }
}
    
?>