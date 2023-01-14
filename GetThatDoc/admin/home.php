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
                          <?php $sql = "select * from fileupload where approved=0";
                          $result = mysqli_query($link, $sql);
                          $num = mysqli_num_rows($result); ?>
                            <h4 class="light"><?php echo $num ?> Pending Approvals</h4>
                        </div>
                    </div>

                    <div class="row"></div>


                    <div class="row">
                        <div class="col s12">
                            <ul class="collapsible popout">

                                    <?php                        
                                        
                                            $sql = "select * from fileupload where approved=0 ORDER BY `id` DESC";
                                            $result = mysqli_query($link,$sql);    
                                        

                                        while($row = mysqli_fetch_assoc($result)){                                  
                                    ?>
                                
                                <li id="s<?php echo $row['id'];?>">
                                    <div class="collapsible-header"><span class="note-name"><b><?php echo $row['id']; ?>.</b>&nbsp;&nbsp;<?php echo $row['title']; ?></span></div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s8 m6 center-align">     
                                                <p>
                                                    <div class="switch"><b>Approved:</b><label>
                                                        <input onclick="toggleApproved(<?php echo $row['id'];?>)" type="checkbox" <?php echo $row['approved'] ? 'checked' : ''; ?>>
                                                        <span class="lever"></span>
                                                    </label></div>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s8 m6 center-align">                          
                                                <p>
                                                    <div class="name"><p><b>Uploader Name:</b>&nbsp;&nbsp;</p>
                                                        <p><?php echo "$row[fname] $row[lname]";?></p>
                                                        <span class="lever"></span>
                                                    </div>
                                                </p>       
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s8 m6 center-align">                          
                                                <a href="../<?php echo $row['filepath']?>" target="_blank" ><button class="btn btn-outline-success" name="dwn">Download</button></a>
                                                <input type="hidden" name="id" value="' . $res['id'] . '">                            
                                                <input type="hidden" name="file-path" value="' . $res['filepath'] . '">                            
                                                <input type="hidden" name="downloads" value="' . $res['downloads'] . '">                            
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col s6 center-align">
                                                <a href="#" onclick="deleteProduct(<?php echo $row['id']; ?>)"><button class="btn delete" name="del">Delete</button></a>
                                            </div>
                                        </div>

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
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
        function toggleApproved(id){
            var id = id;
            $.ajax({
                url: "toggle_approved.php",
                type: "POST",
                data : {'id':id},
                success: function(e){
                    alert("Notes Approved !!");
                    location.reload();
                }
            });
        }
        function deleteProduct(id){
            var id = id;
            $.ajax({
                url: "delete.php",
                type: "POST",
                data : {'id':id},
                success: function(e){
                    alert("Notes Deleted !!");
                    location.reload();
                }
            });
        }
    </script>
</body>
</html>