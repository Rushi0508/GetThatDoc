<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Uploads | GetThatDoc</title>
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
    <link rel="stylesheet" href="./css/viewupload.css">
<body>
    <?php include 'nav.php' ?>

    <h1>My Uploads</h1><br><hr>
   <center><a href="upload.php"><button id="slider-notes">Upload Notes</button></a></center>
   

    <?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM fileupload WHERE user_name='$username' and approved=1";
        $result = mysqli_query($link,$sql);
        $rows = mysqli_num_rows($result);
        if($username=="admin"){
            echo '<a href="./admin/home.php"><p style="text-align: center;">Click for admin side.<p></a>';
        }
        if($rows==0){
            echo "<h3>Oh Sorry! You don't have any Uploads.<h3>";
            echo "<h3>If you have some useful notes you can upload by clicking above.<h3>";      
        }
        
        else{
            echo "<table>";
            echo '<thead>';
            echo '<tr id="header">';
            echo '<th>No.</th>';
            echo '<th>Name</th>';
            echo '<th>Download</th>';
            echo '<th>Number of Downloads</th>';
            echo '</tr>';
            echo '<thead>';
            echo '<tbody>';
            $count=0;
            $showResult = '<div style="position:relative; color:#787878; text-align:center; margin-top: 20px; margin-bottom: 10px; font-size:20px; font-family:Truculenta; letter-spacing:2px; font-weight:bolder;">Great! You have done '.$rows.' uploads till now.</div>';
            echo $showResult;
            while($res = mysqli_fetch_array($result)){
                $count++;
                echo '<tr>';
                  echo '<td data-label="No.">'.$count.'</td>';
                  echo '<td data-label="Name">'.$res['title'].'</td>';
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
              echo "</table>";
        }

    ?>
</body>
</html>