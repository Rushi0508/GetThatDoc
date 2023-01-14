<?php
    include ("../db_connect/config.php");
    $id = $_POST['id'];
    $sql = "select * from fileupload where id = $id";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_assoc($result);
    $approved = $data['approved'];
    if($approved==1){
        $approved = 0;
    }else{
        $approved = 1;
    }
    $update = "update fileupload set approved = '$approved' where id = $id";
    $result = mysqli_query($link,$update);
    if($result){
        echo $approved;
    }
    ?>