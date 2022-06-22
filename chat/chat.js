function  select_query(identity){return document.querySelector(identity)}

function  fetch_data(php_file ){
    var url  = new URL(window.location.href);   // this gets the url for sending to the  server for further procesing  
    var  user_id =  url.searchParams.get("user_id");
    


    let xhr  = new XMLHttpRequest();
    xhr.open("POST" , php_file+"?user_id="+user_id);  //sending the user id to the server  
    xhr.onload =() =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data  =  xhr.response;

                if(data  == "user id not set"){
                    location.href = "/Real_Talk/login/";
                }
                else if(data  == "session id not set"){
                    location.href = "/Real_Talk/login/";
                
                }
                else{
                    let output  = JSON.parse(data)
                    let  profile_img  = select_query('.user-profile-img') , username  = select_query('.user-full-name') , activity = select_query('.online-offline-status') ,
                          outgoing_id = select_query('.outgoing_id') , incoming_id = select_query('.incoming_id');
                        
                        //    setting the properties properly  

                          outgoing_id.setAttribute("value",output[0]); 
                          incoming_id.setAttribute("value",output[1]); 
                          username.textContent = output[2];
                          profile_img.setAttribute('src' ,output[3])
                          activity.textContent = output[4]
                    
                }
              
            }
        }
    }
    let formData  = new FormData();
    xhr.send(FormData);
}

fetch_data("chat_fetch.php")


