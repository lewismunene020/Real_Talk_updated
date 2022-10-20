<?php
session_start();
    include_once "config.php";
    $search_term = mysqli_real_escape_string($conn , $_POST['search_term']);
    $output="";
    $outgoing_msg_id = $_SESSION['unique_id'] ;
    // lets search the results 
    $sql  =  mysqli_query($conn , "SELECT * FROM users WHERE NOT unique_id = '{$outgoing_msg_id}' AND (fname LIKE '%{$search_term}%' OR lname LIKE '%{$search_term}%' )");

    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        include "data.php";
    }
    else{
        $output.= "No search result  was found ";
    }
    echo $output;

?>