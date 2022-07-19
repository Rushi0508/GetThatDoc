<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Display PDF</title>
</head>

<body>
    <div class="div1">
        <?php
        include 'connection.php';

        $sql="SELECT * FROM fileupload";
        $query=mysqli_query($conn, $sql);
        while ($info=mysqli_fetch_array($query)) {
        ?>
            <span>Name : </span> <?php echo $info['fname'] . $info['lname']?>
            <span>Title : </span> <?php echo $info['title'] ?>
            <?php  echo "<a href='" . $info['filepath'] . "' > Download</a>" ?>
            </div>
        <?php    
        }
        ?>
</body>

</html>