<?php
    session_start();

    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn ,   $_POST['outgoing_id']) ;
        $incoming_id = mysqli_real_escape_string($conn ,   $_POST['incoming_id']) ;

        $output="";

        $sql = "SELECT * FROM messages 
                LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id 
                WHERE (	outgoing_msg_id = '{$outgoing_id}'  AND incoming_msg_id = '{$incoming_id}' ) 
                OR ( incoming_msg_id = '{$outgoing_id}'  AND outgoing_msg_id = '{$incoming_id}' ) ORDER BY messages.id ASC";

        $query = mysqli_query($conn , $sql);
        // if($query){
        //     echo"Messages Captured Successsfully";
        // }
        // else{
        //     echo mysqli_error($conn);
        // }


        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query) ){
                if($row['outgoing_msg_id'] === $outgoing_id ){
                    $output .='
                    
                                <div class=" chat outgoing">
                                <div class="details">
                                    <p>'.$row['message'].'</p>
                                </div>
                                </div>';
                }
                else{
                    $output .=' <div class=" chat incoming">
                                <img src="/php_files/Image_uploads/'.$row['image'].'" alt="">
                                <div class="details">
                                        <p>'.$row['message'].'</p>
                                </div>
                                </div>';
                }
            
                
            
            }
            echo $output;
        }
        else{ // if there are  messages 
            $output .= "No messages in this chat ";
            echo $output;
        }
        // if the user unique id is not set 
    }
    else{
        header("location:/User_Acccount/login.php");
    }

?>