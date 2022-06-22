<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn , $_POST['first-name']);
$lname = mysqli_real_escape_string($conn , $_POST['last-name']);
$email = mysqli_real_escape_string($conn , $_POST['email']);
$password = mysqli_real_escape_string($conn , $_POST['password']);

// tes ting if the form is empty 
if( !empty($fname) && !empty($lname) && !empty($email) && !empty($password) ){
            // lets validate the email
            if(filter_var($email , FILTER_VALIDATE_EMAIL)){
                // checking if email exists in the database or not 
                $sql = mysqli_query( $conn, "SELECT email from users where email ='{$email}' ");

                if(mysqli_num_rows($sql) > 0){
                    echo $email."  already exist!!!!!";

                }
                else{
                     // lets check if user uploaded an image 
                     // checking if file has been set  and is not empty
                     if(isset($_FILES['image']) && ( !empty($_FILES['image']['tmp_name']) ) ){  
                        

                        // echo $image_name . $image_type .$tmp_name;
                        $image_name = $_FILES['image']['name'] ;
                        $tmp_name =$_FILES['image']['tmp_name'];
                    

                        //lets explode the image and get the last extension ....jpg ,png...,jpg
                        $image_explode = explode('.' , $image_name);//stores the uploaded file name excluding the extension
                        $image_ext = end($image_explode); // stores the uploaded file extension .... 
                        $extensions = ['png' , 'jpeg' , 'jpg']; // accepted image extensions 
                     
                        // echo $image_explode[0]." \n" .$image_explode[1];

                        if(in_array($image_ext ,$extensions)){ 
                          
                            /// checks if the image is of  valid file type 
                            $time = time();  // returns the current time in second
                            $new_img_name = $time . $image_name; // assigns the file a new name beginning with current time and ending with the file name 

                            // lets move the file to the image uploads folder
                            if(move_uploaded_file($tmp_name , "Image_uploads/".$new_img_name) ){
                                       
                          

                           

                                                    $status = "Active now ";
                                $random_id = md5(  rand(time() , 10000000) );
                                
                                
                                 // lets send the  verification email                                    
                                 $receiver  = $email;
                                 $subject = "Hi there  ".$fname ."  ".$lname." kindly click the link below to verify your account ";
                                 $body = "http://localhost/Real_Talk/Verification/?unique_id=$random_id";
                                 $sender = "From:lewismunene020@gmail.com";

                                 if( ! mail($receiver , $subject , $body , $sender) ){
                                    //  echo "email sent succesfully to  ".$receiver;
                                        
                                            //lets insert data into the databse
                                            $sql2 =mysqli_query($conn , "INSERT into users (unique_id ,fname ,lname, email , password  , image , status)
                                                VALUES('{$random_id}' , '{$fname}' , '{$lname}' , '{$email}', '{$password}' , '{$new_img_name}' , '{$status}') ");

                                            if($sql2){
                                                    $sql3 = mysqli_query($conn , "SELECT * FROM users WHERE email = '{$email}' ");
                                                    if(mysqli_num_rows($sql3) > 0 ){
                                                        $row = mysqli_fetch_assoc($sql3);
                                                        $_SESSION['unique_id'] = $row['unique_id']; // session id for accessing the  user from other php files 

                                                        $user_id = $row['unique_id'];
                                                    

                                                        // everything went fine lets move on 

                                                        echo "success";
                                                    }
                                            }
                                            else{
                                                echo "something went wrong  kindly try again..";
                                            }
                                }
                                else{
                                    
                                    echo "sorry the email could not be sent something went wrong kindly reload ";
                                }


                            }

                            // if the image is not uploaded

                            else{
                                echo "file could not be uploaded try again later ";
                            }

                            

                        }
                        else{
                            echo "Please select an image file - jpg , png  , jpeg !!!";
                        }


                     }
                     else{
                         echo "please upload an image file !!!";
                     }
                }


            }
            else{
                echo $email. "is not a valid email ";
            }
// if input fields are empty  
}
else{
    echo"All input  fields required ";
}

?>
