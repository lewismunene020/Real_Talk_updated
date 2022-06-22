
 // lets match the passwords
 function matched_passwords(pass1_id , pass2_id  , error_indicator ){
    function select_query(path){var x = document.querySelector(path); return x;}
    var   error_display = select_query(error_indicator) ,
        pass1 = select_query(pass1_id),
        pass2 = select_query(pass2_id);

    function  validate(){
        let  pass1_val = pass1.value ,pass2_val = pass2.value
                ,len1=pass1_val.length , len2 = pass2_val.length;
            if(  (len1 < 4) || (len2 < 8) ){
                error_display.style.display ="block";
                    error_display.textContent = "Password requires  a minimum of 8 characters  ";
            }
            else if(!(pass1.value == pass2.value)  ){
                error_display.style.display ="block";
                error_display.textContent = "Passwords do not match ";
            }
            else{
                error_display.style.display ="block";
                error_display.style.color="white";
                error_display.style.background="green";
                error_display.textContent = "Passwords matched successfuly  ";


                
            }
    }

    pass1.onkeyup =() =>{
        validate()
    }
    pass2.onkeyup =() =>{
        validate();
    }
   
   

       
        



 }