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
echo '<script>confirm("Press Ok to Log Out.");
window.location.href="http://localhost/GetThatDoc/home.php"; 
</script>';
?>