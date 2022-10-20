<?php

    include_once "config.php";
    $sql = mysqli_query($conn , "SELECT * FROM  users WHERE  id = 1");

    $data =false;

    while( $row = mysqli_fetch_assoc($sql) ){
        echo $row['unique_id'];
    }

    
?>