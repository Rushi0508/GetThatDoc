<?php
include('./db_connect/config.php');
?>


<html>
    <body>
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="search notes">
            <input type="submit">
        </form>


        <?php
            if(isset($_GET['query'])){
                $query = $_GET['query'];
                $query = $conn -> real_escape_string($query);
                $sql = "select * from fileupload where (title like '%".$query."%')";
                $row = mysqli_query($conn,$sql);
                $result = mysqli_num_rows($row);
                
                if($result>0){
                    $count=1;
                    echo $result . " " . "results found";
                    echo "<br>";
                    while($res = mysqli_fetch_array($row)){
                        echo "<p> ".$res['id']." ".$res['fname']." ".$res['lname'] ."   ". $res['title'] . "</p>" ;
                        echo "<a href='" . $res['filepath'] . "' > Download</a>";
                        echo "<hr>";
                        $count++;
                    } 
                }
                else {
                    echo "No results found";
                }
            }
        ?>
    </body>
</html>