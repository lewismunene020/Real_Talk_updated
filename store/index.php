
<!-- set one php header for all the pages since it is repetitive   -->
<!-- each top should have the page title set and a favion icon set for all the pages  -->
<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location:/Real_Talk/home/");
  }
  
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="login/style.css">
    
<title>Real Talk SignUp</title>
 
    </head>
    <body>

      <center>
   
            <div id="sign-up-form">

                  <header>
                    <div id="heading">Real Talk</div>
                  </header> 
                    <p id="validation-display"id ="signup-success"></p>
        <center>
          <fieldset id="sign_up_form">

                  <legend>SIGN UP FORM</legend>
                  
                  <div class="error-indicator"> Invalid  credentials </div>
                        
                      <form class="sign_up_form" action="#"enctype="multipart/form-data" >

                  <div class="input-section">
                      <label>First Name </label>
                      <input  class="input_form first-name"type="text" name="first-name" placeholder="Enter your firstname"  required autofocus><br>
                  </div><br>

                  <div class="input-section">
                      <label>Last Name </label>
                      <input  class="input_form last-name"type="text" name="last-name" placeholder="Enter your lastname"  required autofocus><br>
                  </div><br>

                  <div class="input-section">
                      <label>Email <br>address </label>
                      <input class="input_form email" type="email" name="email"  placeholder="Enter your email address" required  ><br>
                  </div> <br>

                      <div id="profile-photo-section">
                          <label>Profile Photo</label>
                          <input class="input_form" type="file" accept="image/*" name="image" id="profile-photo" required>
                      </div><br>

                            
                                  <div class="input-section"id="show-password">
                                    <label>Password</label>
                                    <input class="input_form pass"id="password1"type="password"name="password" placeholder="Enter password"required>
                                    <span id="show-pass"><img src="/Real_Talk/Images_and_icons/show_password.png" id="password-icon"></span>
                                    <span id="hide-pass"><img src="/Real_Talk/Images_and_icons/hide_password.png" id="password-icon"></span>
                                  </div><br>
                              

                            
                                  <div class="input-section" id="show-password">
                                      <label>Confirm<br> password</label>
                                      <input class="input_form pass password2"name="password2" id="password2" type="password"  placeholder="Confirm password"required >
                                  </div><br>
                              
                            <!--- <button type ="submit" onclick="matchPassword()">password Testing</button>---->
                          
                              <input class="submit continue_btn"value="Continue"type="submit" name="submit"   required>

                      </form>
                    
                  <p id="login">Already Signed up ???  <a href="/Real_Talk/accounts/login.php">Login</a></p>
          </fieldset>
          </center>
            </div>
           
      </center>     
<script src="test_sign_up.js"></script>
    </body>
</html>