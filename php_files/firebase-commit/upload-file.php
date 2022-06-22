<?php
   include "dbconfig.php";
   if(isset($_FILES['firebase-upload'])){
       if( !($_FILES['firebase-upload']['tmp_name'] != NULL) ){
          echo "Please select a file ";
       }
       else{
        $file_name  = $_FILES['firebase-upload']['name'];
        
        // uploading file to firebase
       
             
      $bucket->upload(
            file_get_contents($_FILES['firebase-upload']['tmp_name']),
            [
            'name' =>"firebase-upload".$_FILES['firebase-upload']['name']
            ]
        );

        insert_data($conn ,$file_name );
        
        
       

       }

   }

   else{
       echo "please upload a file";
   }

?>