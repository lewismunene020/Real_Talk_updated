
<!-- set one php header for all the pages since it is repetitive   -->
<!-- each top should have the page title set and a favion icon set for all the pages  -->

<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location:/Real_Talk/HomePage/");
  }
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css">
    
<title>Real Talk Login</title>
 
</head>
  <body>
  <div id="login-form">

            <header>
              <div id="heading">Real Talk</div>
            </header> 
              <p id="validation-display"id ="signup-success"></p>
            <fieldset id="sign_up_form">

            <legend>LOGIN FORM</legend>
            <div style="margin-left: 170px; width: 265px;" class="error-indicator">Incorrect email or password</div>
                <form class="login-form">

              <div class="input-section">
                <label>Email <br>address </label>
                <input class="input_form email" type="email" name="email"   placeholder="Enter your email address"  required autofocus ><br>
              </div><br>
             

                <div class="input-section"id="show-password">
                  <label>Password</label>
                  <input class="input_form pass login-pass"id="password1"type="password"name="password"  placeholder="Enter your password"required>
                  <span id="show-pass"><img src="/Real_Talk/Images_and_icons/show_password.png" id="password-icon"></span>
                  <span id="hide-pass"><img src="/Real_Talk/Images_and_icons/hide_password.png" id="password-icon"></span>
                </div><br>

                <input class="submit continue-btn"value="Login"type="submit" name="submit"  >

                </form>
              
            <p id="login">Not yet Signed Up????  <a href="/Real_Talk/">Sign Up</a></p>
          </fieldset>

    </div>

  <script src="/Real_Talk/JavaScripts_files/login.js"></script>
</body>
</html>