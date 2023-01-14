<?php
    include ("../db_connect/config.php");
    $id = $_POST['id'];
    $sql = "select * from fileupload where id = $id";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_assoc($result);
    $approved = $data['approved'];
    if($featured==1){
        $featured = 0;
    }else{
        $featured = 1;
    }
    $update = "update fileupload set featured = '$featured' where id = $id";
    $result = mysqli_query($link,$update);
    if($result){
        echo $featured;
    }
    ?>