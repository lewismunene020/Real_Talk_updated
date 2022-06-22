  
  // redirecting to link  if condition is true 
  
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
      //   if the xhr request is not ready  
      else{return;}
  
    }
    let formData = new FormData(); 
    xhr.send(formData);
    // data reloaded successfully 
  
  }

  redirect_with_session("/accounts/redirect.php" ,"/home" , "redirect") ;
