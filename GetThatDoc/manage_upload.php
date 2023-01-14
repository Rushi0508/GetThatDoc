<?php
include './db_connect/config.php';
session_start();
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if file was uploaded without errors
        // $filename = $_FILES["anyfile"]["name"];
        $extension = pathinfo($_FILES["anyfile"]["name"], PATHINFO_EXTENSION);
        $basename= uniqid()."-".time();
        $filename = $basename. ".".$extension;
        $filesize = $_FILES["anyfile"]["size"];
        $username = $_SESSION['username'];
        // $firstname = $_SESSION['firstname'];
        // $lastname = $_SESSION['lastname'];
        // $fname = $_POST["fname"];
        // $lname = $_POST["lname"];
        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
        $res = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($res);
        $firstname =$row['firstname'];
        $lastname = $row['lastname'];
        $title = $_POST["title"];
        $dis = $username;
        // echo die($username);

        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(($ext == 'pdf') || ($ext == 'pptx') || ($ext == 'ppt')) {
            // Validate file size - 50MB maximum
            $maxsize = 50 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
            
            // Validate type of the file
                // Check whether file exists before uploading it
                if(file_exists("uploaded/" . $filename)){
                    echo $filename . " is already exists.";
                } else{
                    if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "uploaded/" . $filename)){
                        
                        $filepath = "uploaded/" . $filename;
                            // $dis = "SELECT * FROM users WHERE username = '.$username.'";
                            // $result = mysqli_query($link,$dis);
                            // $row = mysqli_fetch_assoc($result);
                            // $firstname = $row['firstname'];
                            // $lastname = $row['lastname'];
                            $sql="INSERT INTO fileupload (file,size,user_name,fname,lname,title,filepath) VALUES('$filename','$filesize','$dis', '$firstname','$lastname','$title','$filepath')";
                            
                            mysqli_query($link,$sql);
                            
                            echo '<script>confirm("Your File is uploaded successfully and will be approved shortly.");
                            window.location.href="http://localhost/GetThatDoc/viewuploads.php"; 
                            </script>';
                            
                            $path = getcwd();
                    }else{      
                        echo '<script>alert("Your File is not uploaded.");
                        window.history.back(1); 
                        </script>';
                    }
                
                } 
        } else {
            echo '<script>alert("Please select a proper file format");
                  window.history.back(1); 
                  </script>';
        }
}
