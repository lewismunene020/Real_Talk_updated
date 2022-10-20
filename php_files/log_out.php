<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once"config.php";
        $logout_id = mysqli_real_escape_string($conn , $_GET['log_out_id']);

        if(isset($logout_id)){
            $sql = mysqli_query($conn , "SELECT * FROM users WHERE unique_id = '{$logout_id}' ");
            // if the logout id is true 
            if(mysqli_num_rows($sql) > 0){
                $status = "Offline now";
                $sql2= mysqli_query($conn , "UPDATE users SET status = '{$status}' WHERE unique_id = '{$logout_id}' ");
                if($sql2){
                    session_unset();
                    session_destroy();
                    header("location:/login/");

                }
            }
            // if the logout id is fake 
            else{
                header("location:login/");
            }

        }
        else{
            header("location:/login/");
        }
    }else{
        header("location:/login/");
    }
    

?>
