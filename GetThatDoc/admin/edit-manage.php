<?php
include "../db_connect/config.php";
function filterStringBasic($string){
    return trim(addslashes(htmlspecialchars($string)));
    }
if(isset($_GET['q'])){
    $id = filterStringBasic($_GET['q']);
    }else{
    header("Location: ./home.php");
}
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $downloads = $_POST["downloads"];
    $title = $_POST["title"];
    $sql = "UPDATE fileupload SET fname='$fname', lname = '$lname', title='$title',downloads='$downloads' WHERE id = $id";
    $result = mysqli_query($link, $sql);
    if ($result){
        echo '<script>confirm("Notes Successfully Edited");
        window.location.href="./approved.php"; 
        </script>';
    }
}
    
?>