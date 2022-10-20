<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

    $conn = mysqli_connect("sql4.freesqldatabase.com:3306" ,"sql4499851" ,"iRjSLcHdWB" , "sql4499851");
if(!$conn){
   echo "something went wrong";
}
else{
        // echo "connection successful";
}

$storage = (new Factory())
->withServiceAccount('real-talk-storage-firebase-adminsdk-jyjjm-20fba8f6ef.json')
    ->withDefaultStorageBucket('real-talk-storage.appspot.com')
    ->createStorage();

    $bucket = $storage->getBucket();


// inserting into database  

function insert_data($conn , $name){
    $sql = "INSERT INTO `firebase-upload` (`image-name`) VALUES ('image.png');";
    $result = mysqli_query($conn ,$sql);
    if($result){
        echo "insert succesful ";
    }
}