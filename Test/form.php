<?php
session_start();
// setting up the connection 
$conn = mysqli_connect("localhost" ,"root" ,"" , "test");
if(!$conn){
    die("An error occured");
  }
  
else{
        $time_now = time();
        $email = mysqli_real_escape_string($conn ,$_POST['email']);
        $pass =  mysqli_real_escape_string($conn ,$_POST['password']);
        $verified=0;
        $verify_code = md5($email.$time_now);


        if(empty( $_POST['email']) || empty($_POST['password'])){
            echo "All input fields required";
        }
        else{
    
            if( !(filter_var($email , FILTER_VALIDATE_EMAIL)) ){
                echo "Email should  be in correct format ";
            }
            else{
                $sql= mysqli_query($conn , "SELECT * FROM users WHERE email = '{$email}' ");
                 if( mysqli_num_rows($sql) > 0 ){
                    echo $email." already exists ";
                }
                else{
                    $sql2 = mysqli_query($conn ,"INSERT INTO users (email , password ,verification_code , verified)
                      VALUES('{$email}' , '{$pass}' , '{$verify_code}' , '{$verified}')");
                    
                    // getting the verification id  of the user 
                    $sql3 = mysqli_query($conn , "SELECT * FROM users WHERE email = '{$email}' ");
                    if(mysqli_num_rows($sql3) > 0 ){
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['unique_id'] =  $row['verification_code'];
                        $vkey  = $row['verification_code'];
                    
                        // lets send the email to the user for verification 
                        // $to = $email;
                       
                        // $message = "<a href ='http://localhost/Real_Talk/Test/home.php?unique_id=$vkey'>Verify Account </a>";
                        // $headers = "From: lewismunene020@gmail.com \r\n";
                        // $headers.="MIME-Version: 1.0"."\r\n";
                        // $headers.="Content-type:text/html;charset=UTF-8" . "\r\n";
                        // // echo  $headers;
                        // mail($to , $message , $headers);

                        $to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
  
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
------------------------
Username: '.$email.'
Password: '.$verify_code.'
------------------------
  
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$verify_code.'
  
'; // Our message above including the link
                      
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email<div class="open_grepper_editor" title="Edit & Save To Grepper"></div>


                        echo "success";

                    }
         
                   
                }
            }
            //email is well set 
        }
}


?>