<?php
    include_once "config.php";
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    set_up_verification_code($conn , $email);






    function set_up_verification_code($conn , $email){
    
        $query =  select_with_email($conn , $email);


        if(mysqli_num_rows($query) >0){

            $rand  = (rand(100000, 900000)); // six digit code  

            // lets update the recovery code 
            $sql2 = "UPDATE users  SET recovery = '{$rand}' WHERE email= '{$email}' ";
            $query2 = mysqli_query($conn , $sql2);

            // setting sessions for unique_id and recovery id  

                    mail_recovery_id($email , $rand);
                    
            
        }
        else{
            echo "user does not exist";
        }
    }




    // mail recovery function     

    function  mail_recovery_id($email  , $rand){
        // lets send the  verification code                                    
        $receiver  = $email;
        $subject = "Verify account recovery ";
        $body = "Enter the verification code below to verify your account : 
            \n".$rand;
        $sender = "From:realtalk@yahoo.com";

        if(! mail($receiver , $subject , $body , $sender) ){
                echo "Check the verification code sent to  ".$receiver."  to verify your account  ".$rand;

        }
        else{
                echo "something went wrong please try again later  ";
        }
    }

    // select all with email  from a database 

    function select_with_email($conn , $email){
        $sql = "SELECT * FROM users WHERE email= '{$email}' LIMIT 1 ";
        $query = (mysqli_query($conn , $sql));
        return $query;
    }




    


?>