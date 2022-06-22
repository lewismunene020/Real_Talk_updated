<?php
         session_start();
          include_once($_SERVER['DOCUMENT_ROOT'].'/php_files/config.php');

          

          $sql = mysqli_query($conn , "SELECT * from users where unique_id ='{$_SESSION['unique_id']}' ");
          if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            //  sending the array of data to the  users in  json format  
              echo  json_encode( destructure($row) );

              
          }
          else{
              session_unset();
              session_destroy();

              echo "session expired please  login again";
              
          }

        //   destrucuring the fetched row  

        function destructure($row){
            $data = array(
                0 =>  $row['fname']." ". $row['lname'],
                1 =>  $row['status'] ,
                2 =>  '/php_files/log_out.php?log_out_id='. $row['unique_id'],
                3 =>  '/php_files/Image_uploads/'.$row['image'] 
            );
    
            return $data;

        }


?>
