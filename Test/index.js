
function select_query(path){var x = document.querySelector(path); return x;}

var form = select_query('.sign_up_form') ,
            continueBtn = select_query('.continue'),
            password = select_query('#pass'),
            error = select_query('.error');

form.onsubmit = (e) =>{
    e.preventDefault();
}

continueBtn.onclick = () =>{
    
    var pass = password.value;
    if(pass.length < 8 ){
        error.style.display='block';
        error.textContent = "password needs a minimum of 8 characters";
    }
    else{
        // error.style.display='none';
        let xhr = new XMLHttpRequest();
        xhr.open("POST" , "form.php" , true );
        xhr.onload = () =>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data  = xhr.response;
                    error.textContent = data;   
                    if(data == "success")   {
                        location.href="home.php";
                    }
                    
                }
            }
        }
        // sending form data 
        let formData = new FormData(form);
        xhr.send(formData);

    }
}





