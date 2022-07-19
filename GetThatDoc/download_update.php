<?php
include './db_connect/config.php';
    if(isset($_POST['dwn'])) {
        $Id = $_POST["id"];
        $open = $_POST['file-path'];
        $downloads = $_POST["downloads"];
        $sql = "UPDATE `fileupload` SET downloads= $downloads+1 WHERE `id`='$Id'";   
        $result = mysqli_query($link, $sql);
        echo '<script>;
                window.location.href="http://localhost/GetThatDoc/'.$open.'";
            </script>';
    }
?>