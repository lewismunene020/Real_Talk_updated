function select_query(path){
    var x = document.querySelector(path); 
    return x;  }

var verify = select_query('#verify-btn'),
    form = select_query('#verify-form') ,
    body = select_query('body'),
    error_display = select_query('#error') ,
    verify_guide = select_query('#verify-guide');


// lets check if the account is verified once the body loads 
body.onload =() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "verify.php");
    xhr.onload = () =>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status == 200){
                 let data = xhr.response;
                 if(data =="Page  not Found"){
                    verify_guide.style.display="none";
                    error_display.style.display ="block";
                    error_display.textContent = data;
                   
                }
                else if(data == "Account is already verified kindly login to your account"){
                    location.href = "/Real_Talk/User_Acccount/login.php";
                }
                 else{
                     verify_guide.style.display="none";
                     verify.value = "Login";
                     verify.style.display ="block";
                     error_display.style.display ="block";
                     error_display.textContent = data;
                 }
               
 
             }
         }
     }
           //    sending data 
           let formData = new FormData(form);
           xhr.send(formData);


}


verify.onclick= () =>{
    location.href = "/Real_Talk/User_Acccount/login.php";
}

