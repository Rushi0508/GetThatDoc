<?php
include './db_connect/config.php';
session_start();

if(isset($_SESSION['username'])){
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["userId"]);

session_unset();
session_destroy();
}
if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
    setcookie("user", '', time() - (3600));
    setcookie("pass", '', time() - (3600));
}
echo '<script>confirm("Press Ok to Log Out.");
window.location.href="http://localhost/GetThatDoc/home.php"; 
</script>';
?>
