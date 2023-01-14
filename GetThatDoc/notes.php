<?php 
include './db_connect/config.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes | GetThatDoc</title>
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
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/notes.css">
    
</head>
<body>

        <!-- Navigation bar -->

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

              <!-- Main Section -->
    <div class="box">
      <!-- <input type="checkbox" id="check"> -->
      <div class="search-box">
        <form action="notes.php" method="get">
        <input type="text" placeholder="Search Notes here..." name="search">
        <label for="check" class="icon">
          <button type="submit" name="submit"><i class="fas fa-search"></i></button>
        <!-- <input type="submit" name="submit"> -->
        </label>
        </form>
      </div>
   </div>
        
   
   <table>
    <?php
    echo '<thead>';
        echo '<tr id="header">';
        echo '<th>No.</th>';
        echo "<th>Name</th>";
        echo "<th>Uploader Name</th>";
        echo '<th>Download</th>';
        echo '<th>No. of Downloads</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        if(isset($_GET['search'])){
          $query = $_GET['search'];
          $query = $link -> real_escape_string($query);
          $sql = "select * from fileupload where (title like '%".$query."%') and approved = 1";
          $row = mysqli_query($link,$sql);
          $result = mysqli_num_rows($row);
          
          if($result>0){
              $count=1;
                $min=0.01;
                $max=0.1;
                $time =  "Found " . $result . " results in 0.0" . rand(1,10). " "."seconds";
                $showError = '<div style="position:relative; color:#787878; text-align:center; margin-top: 40px; margin-bottom: 10px;">'.$time.'</div>';
                echo $showError;
                $count=0;
              while($res = mysqli_fetch_array($row)){
                $count++;
                $name = $res['fname'] . " ";
                $fullname = $name . $res['lname']; 
                echo '<tr>';
                  echo '<td data-label="No.">'.$count.'</td>';
                  echo '<td data-label="Name">'.$res['title'].'</td>';
                  echo '<td data-label="Uploader Name">'.$fullname.'</td>';
                  echo '<td data-label="Download">
                        <form action="download_update.php" method="POST">                            
                        <a href="' . $res['filepath'] .'" target="_blank" ><button class="btn btn-outline-success" name="dwn">Download</button></a>
                        <input type="hidden" name="id" value="' . $res['id'] . '">                            
                        <input type="hidden" name="file-path" value="' . $res['filepath'] . '">                            
                        <input type="hidden" name="downloads" value="' . $res['downloads'] . '">                            
                        </form>
                        </td>';
                  echo '<td data-label="No. of Downloads">'. $res['downloads'].'</td>';
                echo '</tr>';
              } 
              echo '</tbody>';
          }
          else {
            $showError = '<div style="position:relative; color:red; text-align:center; margin-top: 40px; margin-bottom: 10px;">No results Found.</div>';
            echo $showError;
          }
        }
        else{
      ?>
        <?php
        echo '<h1 id="notes-head">Few notes...</h1>';
        $sql="SELECT * FROM fileupload where approved = 1 and featured = 1";
        $query=mysqli_query($link, $sql);
        $count=0;
        while ($res=mysqli_fetch_array($query)) {
            $count++;
            $name = $res['fname'] . " ";
            $fullname = $name . $res['lname'];
            echo '<tr>';
              echo '<td data-label="No.">'.$count.'</td>';
              echo '<td data-label="Name">'.$res['title'].'</td>';
              echo '<td data-label="Uploader Name">'.$fullname.'</td>';
              echo '<td data-label="Download">
                      <form action="download_update.php" method="POST">                            
                      <a href="' . $res['filepath'] .'" target="_blank" ><button class="btn btn-outline-success" name="dwn">Download</button></a>
                      <input type="hidden" name="id" value="' . $res['id'] . '">                            
                      <input type="hidden" name="file-path" value="' . $res['filepath'] . '">                            
                      <input type="hidden" name="downloads" value="' . $res['downloads'] . '">                            
                      </form>
                    </td>';
              echo '<td data-label="No. of Downloads">'.$res['downloads'].'</td>';
            echo '</tr>';
            if($count>5){
              break;
            }
          }
          echo '</tbody>';
            ?>
        <?php    
        }
        ?>   
    </table>
    <script src="app.js"></script>
</body>
</html>

<?php }
else {
  echo '<script>alert("Kindly Login to Download Notes");
        window.location.href="http://localhost/GetThatDoc/login.php";
        </script>';
}
?>


      
