<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn , $_POST['email']);
$password = mysqli_real_escape_string($conn , $_POST['password']);

if( !empty($email)  && !empty($password)){
    // lets check the user entered a corect email 
    $sql = mysqli_query($conn , "SELECT * FROM users WHERE  email = '{$email}' AND password='{$password}' ");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        
        // check unverified account 
        if($row['verified'] == 1){  //lets remove  the verification 
            $_SESSION['unique_id'] = $row['unique_id']; 
            // setting offline to online
            $status = "Online";
    
            $sql2 = mysqli_query($conn , "UPDATE users SET status = '{$status}' WHERE unique_id = '{$row['unique_id']}' ");
              
            echo "success";
        }
        else{
            echo "Account not verified kindly check verification email ";
        
                // setup the resending of the verification email here 
                // set up forgot password feature  that enables you to reset your password 
                

        }
       
    }
    else{
        echo "Invalid email or password ";
    }

}
else{
    echo "All Fields Required !!!";
}


?>