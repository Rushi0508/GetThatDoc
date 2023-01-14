<?php
    include ("../db_connect/config.php");
    $id = $_POST['id'];
    $sql = "delete from fileupload where id = $id";
    $result = mysqli_query($link,$sql);
    if($result){  ?>
        <script>
            window.alert("Press OK to Delete !!");
            window.location.href("#")
        </script>
    <?php } ?>
   