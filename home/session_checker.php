<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/Real_Talk/php_files/config.php');
    session_start();
    if(!isset($_SESSION['unique_id'])){
        echo "session is not set";
    }

    // if the session is set  lets  fetch the data  
    else{
    //    echo $_SESSION['unique_id'];
    }
?>