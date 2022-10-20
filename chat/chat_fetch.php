<?php
      session_start();
      
// getting the user id  on the nav link 

        if($_GET['user_id'] ==""){
            echo "user id not set";
        }
        
        else{
        include_once($_SERVER['DOCUMENT_ROOT'].'/php_files/config.php');
        $user_id = mysqli_real_escape_string($conn , $_GET['user_id']);
      
        $sql = mysqli_query($conn , "SELECT * from users where unique_id ='{$user_id}' ");

            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                if(isset($_SESSION['unique_id'])){
                     $session_id = mysqli_real_escape_string($conn , $_SESSION["unique_id"]);
                     $full_name = $row['fname']."  ".$row['lname'];
                     $profile_image = "/php_files/Image_uploads/".$row['image'];
                     $status = $row['status'];
                     
                     $output = array(
                        0 => $session_id ,
                        1 => $user_id ,
                        2 => $full_name , 
                        3 => $profile_image , 
                        4 => $status
                    );
                    

                     echo json_encode($output);



                }
                else{
                    echo "session id not set";
                }
              
                

            }
            else{
                echo "back off unique id injection  is not allowed bitch ";

            }

        }


        
   
  ?>