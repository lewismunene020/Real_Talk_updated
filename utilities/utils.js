function get_by_id(id){var y = document.getElementById(id); return y}
function select_query(path){var x = document.querySelector(path); return x;}

function select_all(path){
  return   document.querySelectorAll(path)
}

// redirects to a certain  link after a certain interval 

function  redirect_with_delay_after_clicking_button(link_to_direct_to , delay="1000"){
    setTimeout( () =>{
            location.href=link_to_direct_to;
    }, delay);

}


// redirect with a certain condition 

function  redirect_with_session(php_path , redirect_to ,string_condition){
    let xhr = new XMLHttpRequest(); 
    xhr.open("POST" , php_path , true);
    xhr.onload = () =>{
  
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                  let data  = xhr.response;
                  if(data == string_condition){
                      location.href =redirect_to;
                    }
                  else{return;}
            }
            else{return;}
        }  
      else{return;}
  
    }
    let formData = new FormData(); 
    xhr.send(formData);
  
  }









// ajax connector functionality

function ajax_connector(upload_btn =null, form_id , file_php_path , error_indicator ,method="POST"){
        // function subfunctions 

        function form_creator(form_class){
            let myForm = document.createElement('form');
            myForm.classList.add(form_class);
            return myForm;
        }
        function select_query(path){var x = document.querySelector(path); return x;}
    
        // creating a form to send if no form is given 

        var file_form;
        if(form_id == null){
            file_form = form_creator('data_fetch-form');
        }
        else{
            file_form = select_query(form_id);
        }
        
        // initializing php path and querying the error display
        var php_path = file_php_path;
        var error_display= select_query(error_indicator);


        // preventing the form from auto submitting  
        file_form.onsubmit = (e) => {
            e.preventDefault();
        }

        // adding click listener if the submit button is provided 
        if(!(upload_btn== null) ){
            let upload_button = select_query(upload_btn);

            upload_button.onclick =()=>{
            
                    let xhr = new XMLHttpRequest();
                    xhr.open(method ,php_path , true);
                    xhr.onload =() =>{
                        if(xhr.readyState === XMLHttpRequest.DONE){
                            if(xhr.status === 200){
                                let data  = xhr.response;
                                if(data == "success" && form_id == '.login-form'){
                                    location.href="/home/";
                                }

                                else if( data.includes("Check the verification code") && form_id == '.recover-password-form'){
                                    // lets display notification 
                                    error_display.style.display="block";
                                    error_display.textContent=data;
                                    error_display.style.background="green";
                                    error_display.style.color="white";
                                    redirect_with_delay_after_clicking_button(
                                        '/recover-password/verify-recovery/',
                                        2000       
                                    );

                                }

                                // recover id verification 

                                else if( data.includes( 'verification complete set') && form_id == '.recover-password-form' ){
                                    error_display.style.display="block";
                                    error_display.textContent=data;
                                    error_display.style.background="green";
                                    error_display.style.color="white";
                                    redirect_with_delay_after_clicking_button(
                                        '/recover-password/new-password/',
                                        2000       
                                    );

                                }

                                // password recovery  script 
                                else if( data.includes( 'password has been reset successfully') && form_id == '.new-password-form' ){
                                    error_display.style.display="block";
                                    error_display.textContent=data;
                                    error_display.style.background="green";
                                    error_display.style.color="white";
                                    redirect_with_delay_after_clicking_button(
                                        '/login/',
                                        2000       
                                    );

                                }

                                
                                else{
                                    error_display.style.display="block";
                                    error_display.textContent=data;

                                  
                                }
                               
                             
                            }
                        }
                    }
                    let formData = new FormData(file_form);
                    xhr.send(formData);
            }
            
        }
   
        // fetches data from the data base if the sy=ubmit button is not given
        // data is fetched at an interval and displayed to theuser  oftenly 

        else{
            let display_fetch = select_query(error_indicator);
                setInterval( ()=>{
                    let xhr = new XMLHttpRequest();
                    xhr.open(method ,php_path);
                    xhr.onload =() =>{
                        if(xhr.readyState === XMLHttpRequest.DONE){
                            if(xhr.status === 200){
                                let data  = xhr.response;
                                
                                display_fetch.innerHTML = data;
                                //   console.log(data);
                                // return data;
                            }
                        }
                    }
                    let formData = new FormData(file_form);
                    xhr.send(formData);
                },2000);
        }
}


