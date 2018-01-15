<?php
    $conn = mysqli_connect('localhost', 'root', '1234567', 'phpBlog');
     
    if(mysqli_connect_errno()) {
        //Connection Failed
        echo 'Failed to connect to MYSQL, ' . mysqli_connect_errno();    
    }
?>