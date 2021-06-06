<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_exam');
if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }
date_default_timezone_set('Asia/Kolkata');
?>
