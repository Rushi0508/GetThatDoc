<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GetThatDoc</title>
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
<link rel="stylesheet" href="./css/home.css">
<script src="app.js"></script>
</head>
<body>
    <?php 
        include 'nav.php'; 
    ?>
    <div id="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block single" src="./images/slider1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block caption-1">
                        <h1 id="slide-heading">Hello Learners,</h1>
                        <h1 id="slide-heading">Welcome to GetThatDoc!!</h1><br>
                        <p id="slide-details">Get Notes, Share Notes & Keep Hustling</p>
                        <p id="slide-details">#NotesThatYouReallyNeed!!</p>
                    </div>
                </div>
                  <div class="carousel-item">
                    <img class="d-block single" src="./images/s3.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block caption-2">
                        <p id="slide-details">Getting every notes is just one click away,</p><br>
                        <p id="slide-details">Click below to get notes related to any field</p><br>
                        <a href="notes.php"><button id="slider-notes">Get Notes</button></a>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img class="d-block single" src="./images/s1.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block caption-3">
                        <p id="slide-details">Hey, do you have some intresting notes to share?</p><br>
                        <p id="slide-details">Click the below button to help learners by uploading your notes,</p><br>
                        <a href="upload.php"><button id="slider-notes">Upload Notes</button></a>
                    </div>
                </div> 
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br><br>
    <div id="data-container">
        <h1>Why Choose Us?</h1><br><hr width="80%" style="margin: auto;"><br>
        <div id="data">
            <div class="single-data">
                <h1>Website visits</h1>
                <h1 id="web-count">0</h1>
            </div>
            <div class="single-data">
                <?php
                    $users_sql = "SELECT * from users";
                    $result_sql = mysqli_query($link,$users_sql);
                    $n_users = mysqli_num_rows($result_sql);
                    echo "<h1>Registered Users</h1>";
                    echo "<h1>$n_users</h1>";
                ?>            
            </div>
            <div class="single-data">
                <?php
                    $notes = "SELECT * from fileupload";
                    $result_sql = mysqli_query($link,$notes);
                    $n_files = mysqli_num_rows($result_sql);
                    echo "<h1>Number of Notes</h1>";
                    echo "<h1>$n_files</h1>";
                ?>   
            </div>
        </div>
    </div>
    <div id="footer">
        <h5>Made with ❤️ in India | Copyright &#169; GetThatDoc 2022 </h5>
    </div>
    <script>
      function countvisits(response) {
        document.getElementById("web-count").innerText = response.value;
        };
    </script>
    
    <script async src="https://api.countapi.xyz/hit/GetThatDoc/web-count?callback=countvisits"></script>
</body>

</html>