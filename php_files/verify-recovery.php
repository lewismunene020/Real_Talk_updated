<?php

session_start();

include_once "config.php";
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $verification_code = mysqli_real_escape_string($conn , $_POST['verification-code']);

    $sql = "SELECT * FROM users WHERE email= '{$email}' LIMIT 1";

    $query = mysqli_query($conn , $sql);

    if(mysqli_num_rows($query) >0){
        $row = mysqli_fetch_assoc($query);

        if($row['recovery'] == $verification_code){
            echo "verification complete set  up new password";

            $_SESSION['user_id'] = $row['unique_id'];   ///this one is use once and destroyed once password is reset 
            $_SESSION['recovery_id'] = $row['recovery'] ;

        }
        else{
            echo "wrong verification code kindly  request rsend or check the email sent to you please";
        }
    }




?>