<?php
   
    $conn = mysqli_connect("sql4.freesqldatabase.com:3306" ,"sql4499851" ,"iRjSLcHdWB" , "sql4499851");
    if(!$conn){
       echo "something went wrong";
    }
    else{
        


    //    inserting into data  
    function insert_data($name){
        $conn = mysqli_connect("sql4.freesqldatabase.com:3306" ,"sql4499851" ,"iRjSLcHdWB" , "sql4499851");
        $sql = "INSERT INTO `firebase-upload` (`image-name`) VALUES ('{$name}');";
        $result = mysqli_query($conn ,$sql);
        if($result){
            echo "insert succesful ";
        }
    }


    }

?>
