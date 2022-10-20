
function  select_query(identity){ return document.querySelector(identity) }
let  form = select_query('.sign-up-form'),
    continue_btn = form.querySelector('#sign-up-btn');

let   error_display = select_query('.error-indicator');

let   pass1 = select_query('#password1'),
      pass2 = select_query('#password2');


form.onsubmit = (e) => {
    e.preventDefault();
}

continue_btn.onclick = () =>{
    // location.href="#"
    // lets match the passwords 
    var pass1_val = pass1.value ,pass2_val = pass2.value
    ,len1=pass1_val.length , len2 = pass2_val.length;
    


    if(  (len1 < 8) || (len2 < 8) ){
        error_display.style.display ="block";
            error_display.textContent = "Password requires  a minimum of 8 characters  ";
    }

    else if(!(pass1.value == pass2.value)  ){
        error_display.style.display ="block";
        error_display.textContent = "Passwords do not match ";
    }
    





    else{

        
    // console.log("Xml htttp request loaded");
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("POST" , "/php_files/signup_form.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href ="/login";
                    
                }
                else{
                    error_display.textContent= data;
                    error_display.style ="display:block";
                }

            }
        }  
    }
    // lets send data to the php form 
    let formData = new FormData(form); // FormData object 
    xhr.send(formData); // sends form data object to the php file 

    }
 }
