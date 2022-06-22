<?php

session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/Real_Talk/php_files/config.php');
 
  $user_id  = mysqli_real_escape_string($conn , $_POST['user_id']);
  
  $sql = mysqli_query($conn , "SELECT * FROM users WHERE unique_id  ='{$user_id}' ");
  $row = mysqli_fetch_assoc($sql);

  if(mysqli_num_rows($sql) > 0){

            // if account is not verified 
            if($row['verified'] == 0){
                
                $verified = 1;
                $sql2 = mysqli_query($conn , "UPDATE users SET verified ='{$verified}' WHERE unique_id = '{$user_id}' ");
                
                $sql3=  mysqli_query($conn , "SELECT * FROM users WHERE unique_id = '{$user_id}' ");
                $row3 = mysqli_fetch_assoc($sql3);

                if($row3['verified'] == 1){
                    echo "Verification complete kindly login "; 
                }
                else{
                    echo "something went wrong kindly try again later";
                }

                
            }
            // if the account is already verified 
            else{
                // echo $row['unique_id'];
                echo "Account is already verified kindly login to your account";
            }
  }
  else{
      echo "Page  not Found";
    
  }
?>