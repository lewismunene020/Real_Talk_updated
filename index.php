<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accounts/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
<!--       <link rel="stylesheet" href="https://grit-fonts.000webhostapp.com/grit-fonts/css/all.css"> -->
    
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
    <title>Sign Up </title>
</head>
<body>
    

    <!-- data to note   -->
    <!-- 
        -- Once an error occurs set it to the specific element 
            that is concerned with the error
            
     -->



<div class="session-check"></div>

<div class="form-container">
        <div class="header">
            <h2>Real Talk Sign Up </h2>
        </div>

 <div class="error-indicator"> Invalid  credentials </div>


    <form action="#" class="sign-up-form">
           
    

            <div class="First Name">
                <div class="form-control">
                    <label id="sign-up-form-label">First Name</label>
                    <div class="input-control">
                        <input class="sign-up-form-input" type="text" name="first-name" id="user-first-name" required>

                        <i class="fas form-validation-icons fa-check-circle valid-circle"></i>
                        <i class="fas form-validation-icons fa-exclamation-circle error-circle"></i>
                    </div>
                    <small>Error message </small>
                </div>
            </div>

            <div class="last-name">
                    <div class="form-control">
                
                        <label id="sign-up-form-label">Last Name </label>
                        <div class="input-control">
                            <input class="sign-up-form-input" type="text" name="last-name" id="user-last-name" required>
                            <i class="fas form-validation-icons fa-check-circle valid-circle"></i>
                            <i class="fas form-validation-icons fa-exclamation-circle error-circle"></i>
                        </div>
                        <small>Error message </small>
                    </div>

            </div>

            <div class="email-address">
                <div class="form-control">
                    <!-- should have the team member images and their positions  -->
                    <label id="sign-up-form-label">Email </label>
                    <!-- <textarea class="sign-up-form-input" name="team-member" placeholder="Team Members responsible  " id="team-member" cols="30" rows="10"></textarea class="sign-up-form-input"> -->
                    
                    <div class="input-control">
                        <input class="sign-up-form-input" name="email" id="user-email">
                        <i class="fas form-validation-icons fa-check-circle valid-circle"></i>
                        <i class="fas form-validation-icons fa-exclamation-circle error-circle"></i>
                    </div>
                    <small>Error message </small>
                </div>
                
            </div>

            <div class="profile-image">
                <div class="form-control">
                        <label id="sign-up-form-label">Profile Image  </label>
                        <!-- <input class="sign-up-form-input" type="file" name="sign-up-form_images[]" placeholder="Portfolio Images" id="sign-up-form-image" accept="image/*"  multiple required> -->
                        <!-- file handled by server  -->

                        <div class="input-control">
                        <input type="file" name="image" id="user-profile-image" accept="image/*" required>
                        
                        <i class="fas form-validation-icons fa-check-circle valid-circle"></i>
                        <i class="fas form-validation-icons fa-exclamation-circle error-circle"></i>
                    </div>
                        <small>Error message </small>
                </div>

            </div>

            <div class="password passfield">

                    <div class="form-control">
                        <label>Password   </label>

                        <div class="input-control">
                            <input type="password" name="password" id="password1" class="input_form password_field" placeholder="44@#?/tgd^^>.,()>" required >
                            <!-- font-awesome icons  -->
                            
                     
                            <i class="fas fa-eye  eye-icons" onclick="show_hide_pass();" id="show-hide-icon"></i>
                            
                            <!-- <i class="fas fa-eye" style="color:green;"></i> -->
                            <i class="fas form-validation-icons fa-check-circle valid-circle"></i>
                            <i class="fas form-validation-icons fa-exclamation-circle  error-circle"></i>
                        </div>
                
                        <small>Error Message </small>
                    </div>

            </div>

            <div class="password2">

                    <!-- password 2  -->
                    <div class="form-control">
                        <label>Password  Check  </label>

                        <div class="input-control">
                            <input type="password" name="password2" id="password2" class="input_form  password_field password2" placeholder="44@#?/tgd^^>.,()>" required >
                        
                            <!-- font-awesome icons  -->
                          
                            <i class="fas form-validation-icons fa-check-circle valid-circle"></i>
                            <i class="fas form-validation-icons fa-exclamation-circle  error-circle"></i>
                        </div>
                    
                        <small>Error Message </small>
                    </div>

            </div>

            <div class="submit-form">
                
                <button href="#"class="submit-btn button" id="sign-up-btn">Submit  </button> 
            </div>

            <p id="login">Already Signed up ???  <a href="/login">Login</a></p><br>
       

        
           
    </form>

</div>

<script src="utilities/utils.js"></script>
<script src="signup/sign_up.js"></script>
<!-- <script src="https://grit-fonts.000webhostapp.com/grit-fonts/js/all.js"></script> -->
<script src="signup/show-hide-pass.js"></script>
<script src="accounts/redirect.js"></script>

<script src="utilities/favicon_creator.js"></script>
<script src="/fontawesome/js/all.min.js"></script>
<!-- <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
</body>
</html>
