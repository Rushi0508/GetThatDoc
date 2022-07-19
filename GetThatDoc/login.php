<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/login_signup.css">   
	<title>Login | GetThatDoc</title>
</head>
<body>
    <?php 
        ob_start(); 
        include 'nav.php'
    ?>
    <div id="wpr">
	<div class="container">
		<form action="login.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="uname" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="psw" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="signup.php">Sign Up Here.</a></p>
		</form>
	</div>
    </div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './db_connect/config.php';
    $username = $_POST["uname"];
    $password = $_POST["psw"]; 
    
    $sql = "Select * from users where username='$username'"; 
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['userid'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            header("location: /GetThatDoc/home.php?loginsuccess=true");
            exit();
        } 
        else{
            // $result = '<div style="position:relative; bottom: 100px; color:red; text-align:center;">Wrong Password</div>';
            echo '<script>alert("Incorrect Password! Please enter correct Password.");
            window.history.back(1);
            </script>';
        }
    } 
    else{
    //   $result = '<div style="position:relative; bottom: 100px; color:red; text-align:center;">Sign-Up First</div>';
      echo '<script>alert("You are not registered. Please Sign Up before Login.");
            window.location.href="http://localhost/GetThatDoc/signup.php"; 
            </script>';
    }
}    
?>