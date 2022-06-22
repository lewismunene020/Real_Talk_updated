
function user_data(path ,activity_status , user_name, profile_img, log_out){
    function select_query(identity){return document.querySelector(identity)}
    // selecting the elements  
    var  username = select_query(user_name),profile =  select_query(profile_img) , logout = select_query(log_out) , activitystatus = select_query(activity_status);
    let xhr = new XMLHttpRequest(); 
    xhr.open("POST" , path , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
             
                    let text  = xhr.response;
                    let data = JSON.parse(text);      // decoding the json string array from server
                    username.textContent = data[0];
                    activitystatus.textContent = data[1];
                    logout.setAttribute('href' , data[2]);
                    profile.setAttribute('src' , data[3]);

            }
        }
        // if the XML HTTP request does not load ???? 
      
    }
    let formData = new FormData(); 
    xhr.send(formData);
    
  }

user_data('/home/fetch_current_user.php' , '.activity-status' ,'.username' , '.user-profile-img' , '#logout-link' )
