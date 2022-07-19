<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/nav.css">
<link rel="stylesheet" type="text/css" href="./css/login_signup.css">

	<title>Sign-Up | GetThatDoc</title>
</head>
<body>
    <?php 
      ob_start(); 
      include 'nav.php'
    ?>
    <div id="wpr">
	<div class="container">
		<form action="signup.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign Up</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
  </div>
  </div>
</body>
</html>

<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './db_connect/config.php';
    $username = $_POST["username"];
    // $firstName = $_POST["firstName"];
    // $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    // $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($link, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      // $showError = '<div style="position:relative; bottom: 25px; color:red; text-align:center;">Username already exists.</div>';
      echo '<script>alert("Username already exists. Enter other username");
      window.history.back(1);
      </script>';
    }
    else{
      if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` ( `username`,`email`, `password`, `joinDate`) VALUES ('$username',  '$email',  '$hash', current_timestamp())";   
          $result = mysqli_query($link, $sql);
          if ($result){
              $showAlert = true;
              echo '<script>confirm("You are successfully Registered! Now you can login.");
              window.location.href="http://localhost/GetThatDoc/login.php"; 
              </script>';
          }
      }
      else{
        // $showError = '<div style="position:relative; bottom: 25px; color:red;">Passwords do not match.</div>';
        echo '<script>alert("Passwords do not match");
        window.history.back(1);
        </script>';
      }
    }
}
    
?>