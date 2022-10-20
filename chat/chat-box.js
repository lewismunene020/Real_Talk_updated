function select_query(path){var x = document.querySelector(path); return x;}

var back_arrow = select_query('#back-arrow-btn');

back_arrow.onclick=() =>{

    location.href="/home/";
}


// making chats dynamic 

var form=select_query('#typing-area'),
      inputField =form.querySelector('.input-field'),
      sendBtn=form.querySelector('Button');
// displaying the message
var chat_box= select_query('#chat-box'); 

form.onsubmit = (e) => {
    e.preventDefault();
}

// displaying typing to the screen 
// var typing = select_query('.typing');
var typing_field = select_query('.typing-field');
var typing_status = select_query('.typing-status');
var display_typing = " ";
inputField.onkeypress=() =>{
    typing_field.value = "typing...";
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("POST" , "/Real_Talk/php_files/typing.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                display_typing = data;
                // console.log(data);
            }
        }  
    }
    // lets send data to the php form 
    let formData = new FormData(form); // FormData object 
    xhr.send(formData);
}

// hiding typing 
inputField.onkeyup=() =>{
    typing_field.value = " ";
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("POST" , "/Real_Talk/php_files/typing.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                display_typing = data;
                // console.log(data);
            }
        }  
    }
    // lets send data to the php form 
    let formData = new FormData(form); // FormData object 
    xhr.send(formData);
}




// sending the message 
sendBtn.onclick =() =>{
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("POST" , "/Real_Talk/php_files/insert-chat.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                scrollToBottom();
                // lets empty the input field 
               inputField.value="";
            }
        }  
    }
    // lets send data to the php form 
    let formData = new FormData(form); // FormData object 
    xhr.send(formData); // sends form data object to the php file 

}
// timing typing status 
setInterval( () =>{
    typing_status.textContent = display_typing;
    // console.log(display_typing);
} , 50);

// timing instance of displaying the chat 
setInterval( () =>{
    // lets reload the users in the database each half a second 
         
    // console.log("Xml htttp request loaded");
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("POST" , "/Real_Talk/php_files/get-chat.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chat_box.innerHTML=data;
                
                
            }
        }  
    }

    let formData = new FormData(form); 
    xhr.send(formData);
    // data reloaded successfully 


} , 900 );


// scroll to bottom 
function  scrollToBottom(){
    chat_box.scrollTop = chat_box.scrollHeight;
}





