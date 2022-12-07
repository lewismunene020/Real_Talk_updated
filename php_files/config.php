<?php
   
    $conn = mysqli_connect("localhost" ,"realtalk" ,"Tvc@RealTalk" , "realtalk");
    // $conn = mysqli_connect("localhost" ,"root" ,"" , "realtalk");


    if(!$conn){
       echo "something went wrong";
    }
    else{
        
        // echo "connection  successful";


    //    inserting into data  
    // function insert_data($name){
    //     $conn = mysqli_connect("localhost" ,"lewis" ,"Tv@MuneneMysql" , "flaskChatApp");
    //     $sql = "INSERT INTO `firebase-upload` (`image-name`) VALUES ('{$name}');";
    //     $result = mysqli_query($conn ,$sql);
    //     if($result){
    //         echo "insert succesful ";
    //     }
    // }


    }

?>
