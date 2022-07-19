<?php
include './db_connect/config.php';
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$message = $_POST["message"];
$sql = "INSERT INTO contact(name, email, mobile, message) VALUES ('$name','$email','$mobile', '$message' )";
$result = mysqli_query($link, $sql) or die("Query Failed!");
if($result){
    echo "<script>alert('Your message has been submitted sucessfully');
    window.history.back(1);
    </script>";
  }
// mysqli_close($link);
?>