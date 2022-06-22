<?php
session_start();

include_once "config.php";
    $typing = mysqli_real_escape_string($conn , $_POST['typing']);
    $outgoing_id = mysqli_real_escape_string($conn ,   $_POST['outgoing_id']) ;
    $incoming_id = mysqli_real_escape_string($conn ,   $_POST['incoming_id']) ;


       echo $typing;
    
?>