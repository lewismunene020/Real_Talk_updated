<?php
session_start();
    if(isset($_GET['unique_id'])){
        $user_id=$_GET['unique_id'];
    }
    else{
        header("location:/Real_Talk/User_Acccount/login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="style.css">

</head>

<center>
<body>
   
        <div class="verify-div">
            <header>
                <div id="heading">Real Talk</div>
            </header> 
            <div class="verification">
                <div id ="verify-guide">Click the button below to verify your account </div>

                <!-- error indicator  -->
                <div id="error"></div>

                <form action="" id="verify-form" method="post">
                        <input name="user_id" type="text" value="<?php echo $user_id?>" hidden>
                        <input  name="verify"id="verify-btn" type="button" value="Verify">
                </form>
                  
            </div>

        </div>
  
        <script src="index.js"></script>
  
</body>
</center>
</html>