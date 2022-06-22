function get_by_id(id){var y = document.getElementById(id); return y}
var show = get_by_id("show-pass") , hide= get_by_id("hide-pass");
var pass1 = get_by_id("password1") ;

show.onclick = function(){
    
    show.style = "display:none";hide.style ="display:block";
    pass1.type="text";
}
hide.onclick = function(){
    hide.style = "display:none"; show.style ="display:block";
    pass1.type="password";

}

//more javascript 



function select_query(path){var x = document.querySelector(path); return x;}

const form=select_query('.login-form');
    continue_btn =form.querySelector('.continue-btn');

  var  error_display = select_query('.error-indicator');

var  pass1 = select_query('#password1');
      


form.onsubmit = (e) => {
    e.preventDefault();
}

continue_btn.onclick = () =>{
    // lets match the passwords 
    var pass1_val = pass1.value , len1=pass1_val.length;
   
    if(  len1 < 8 ){
            error_display.style.display ="block";
            error_display.textContent = "Password requires  a minimum of 8 characters  ";
        }


    // if the passwords are matching and  have 8 or more characters
    else{
        
    // console.log("Xml htttp request loaded");
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("POST" , "/Real_Talk/php_files/login_form.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success"){
                    location.href ="/Real_Talk/HomePage/";
                    
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

