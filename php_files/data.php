
<?php

while ( $row = mysqli_fetch_assoc($sql)){
        $sql2 ="SELECT * FROM messages WHERE ( incoming_msg_id  = '{$row['unique_id']}' OR 
        outgoing_msg_id  = '{$row['unique_id']}' ) AND ( outgoing_msg_id = '{$outgoing_msg_id}' OR incoming_msg_id = '{$outgoing_msg_id}' 
         )ORDER BY id DESC LIMIT 1;
         ";

    $you=false;
        $query2 = mysqli_query($conn , $sql2);
          $row2 = mysqli_fetch_assoc($query2);

        if(mysqli_num_rows($query2) > 0){
          
            $result = $row2['message'];


            ($outgoing_msg_id == $row2['outgoing_msg_id'])? $you ="You : " :$you ="";
            
        }
        else{
            $result = "No new Messages ";
        }

        // lets trim the message  if the message is more than 26 characters .....
        (strlen($result) > 28 ) ? $msg  = substr($result , 0, 28).'...'  : $msg = $result;

        // lets add you to the message display if the logged in user sends a message 
        
            $output.='
           <a class="contact-link" href="/chat/?user_id='.$row['unique_id'].'" >
                <div class="contact">
                    <div class="contact-data">
                        <div class="user-profile"><img class="user-profile-img"src="/php_files/Image_uploads/' . $row['image'] . ' " alt=""></div>
                        <div class="contact-name">'. $row['fname']." ". $row['lname'] .'</div> 
                    </div>
                    <div class="message-data">
                        <div id="message">'.$you.$msg.'</div>
                        <div id="new-message"></div>
                    </div>
                </div>
            </a>
         ';
         
        }
?>
