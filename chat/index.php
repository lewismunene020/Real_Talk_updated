<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
       header("location:/login");
    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="chat-box.css">
        <link rel="stylesheet" href="/fontawesome/css/all.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
            
            <title>Real Talk Chat</title>
    </head>
<body>

<div id="chat-box-body">
    
<?php
        if($_GET['user_id'] ==""){
            header("location:/login");
        }
        
        else{

        include_once($_SERVER['DOCUMENT_ROOT'].'/php_files/config.php');
        $user_id = mysqli_real_escape_string($conn , $_GET['user_id']);
        $sql = mysqli_query($conn , "SELECT * from users where unique_id ='{$user_id}' ");

            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
            }
            else{
                header("location:/login");
            }

        }
        
   
  ?>
  <!-- implement feature that helps to reload the online and offline status each time  -->

    <div class="top-bar">
        <div class="back-arrow ">
            <button id="back-arrow-btn"class="back-arrow-image"> <i class="fas  fa-arrow-left" style="  color: white;
   width: max-content;" ></i></button>


        </div>
        <div id="user-data">
                <div id ="user-details">
                    <div class="user-profile"><img class="user-profile-img"src="/php_files/Image_uploads/<?php echo $row['image']?>" alt=""></div>
                    <div class="username"><?php echo $row['fname']." ". $row['lname']?></div> 
                </div>
                <div id="active"><?php echo $row['status'] ?> </div>  
                <!-- options icon should be situated here  -->
                <div class="options"></div> 
               
        </div>
        <div class="typing-status"></div>
        <!-- TSearch message  -->

        <!-- <div class="search-box">
            <input required type="text" placeholder="Search Contact"name="song-name" id="search-user">
            <span id="search-tool"class="search-tool"><img class="search-icon" src="light-mode-search-icon.png" alt=""></span>
        </div><br>  -->

       
    </div>
    <!-- chat-box-->
    <div id="chat-box" class="chat-box">





    </div>
</div> 


<!-- lets display typing moment  -->
<!-- <form action="" class="typing" method="post">
    <input class="typing-field" type="text" name="typing" value="" hidden >
</form> -->

<!-- sending the message  -->
    <form id="typing-area"class="send-message" action="#" autocomplete="off">
        <input name="outgoing_id" type="text" value="<?php echo $_SESSION['unique_id']?>" hidden>
        <input name="incoming_id"type="text" value="<?php echo $user_id?>" hidden>
        <input class="typing-field" type="text" name="typing" value="" hidden >
        <input name="message"class="input-field"  type="text" placeholder="Type a message ......">
        <button class="send-button "><img class="send-icon" src="/Images_and_icons/sendIcon.png" alt=""></button>
    </form>
    
    <script src="/javascript/chat-box.js"></script>
    <script src="/fontawesome/js/all.js"></script>
  
<script src="/utilities/favicon_creator.js"></script>
    
    <script href="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</body>
</html>
