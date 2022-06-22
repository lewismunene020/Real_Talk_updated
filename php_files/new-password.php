<?php
    
    session_start();
    include "config.php";
    $mypass = mysqli_real_escape_string($conn , $_POST['password']);

    if(  isset($_SESSION['user_id'])  && isset($_SESSION['recovery_id'])  ){  ///  this is a different id to prevent automatic sign in  to homepage   using  'unique_id' session 
              
              $query = select_with_user_id($conn , $_SESSION['user_id'] );
              $row = mysqli_fetch_assoc($query);

              if(  ($row['unique_id']== $_SESSION['user_id'] ) ){
                  if($row['recovery'] == $_SESSION['recovery_id']){
                      
                    // lets update the password and set the session then redirect to login page  
                    $user_id = $row['unique_id'];
                    $sql2 = "UPDATE users SET password = '{$mypass}' WHERE unique_id = '{$user_id}' ";
                    $query2 = mysqli_query($conn , $sql2);

                   // lets confirm if the pasword ha been changed  
                 
                    $query3 = select_with_user_id($conn , $user_id);
                    $row3 = mysqli_fetch_assoc($query3);

                    if( $row3['password'] == $mypass ){
                        $random = rand(10000 , 90000);
                        $sql4 = "UPDATE users SET recovery = '{$random}' WHERE unique_id = '{$user_id}' ";
                        $query4 = mysqli_query($conn ,$sql4 );

                        session_unset();

                        // lets change the unique id  
                        echo "password has been reset successfully";
                    }
                    

                      
                  }

                  else{
               
                      echo "recovery id changed kindly check your email address";
                    
                  }
              }
    }
    else{
        echo "something went wrong kindly try again later or  contact administrator for support ";
    }


    function select_with_user_id($conn , $id){
        $sql = "SELECT * FROM users WHERE unique_id = '{$id}' ";
        $query = (mysqli_query($conn , $sql));
        return $query;
    }

?>