
function select_query(path){var x = document.querySelector(path); return x;}

var select_contact = select_query(".select-contact");
var search_bar = select_query('.search-box input');
var search_btn = select_query('#search-tool');
var cancel_btn = select_query('#select-tool');
var contacts = select_query('.contacts') ,
    search_result = select_query('.search-result');

cancel_btn.onclick = function(){
    search_bar.style="display:block";
    search_bar.focus();
    search_btn.style= "display:block";
    select_contact.style= "display:none";
    cancel_btn.style="display:none";
    contacts.style="display:none";
    search_result.style.display="none";
}
search_btn.onclick = function(){
    search_bar.style="display:none";
    search_btn.style= "display:none";
    select_contact.style= "display:block";
    cancel_btn.style="display:block";
    contacts.style="display:block";
}

// lets work on the search bar 
search_bar.onkeyup =() =>{
    let search_term = search_bar.value
    if(search_term !=" "){
        // searching the user 
        let xhr = new XMLHttpRequest(); // new XML Http request 
        xhr.open("POST" , "/php_files/search.php" , true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    search_result.style.display="block";
                    search_result.innerHTML=data;
                    
                }
            }  
        }
        xhr.setRequestHeader("Content-type" ,"application/x-www-form-urlencoded");
        xhr.send("search_term="+search_term);
        // search term sent successfully 
    }  

    else{
        search_result.style.display="none";
    }


    // end of searching 
}


// lets make the users list dynamic
setInterval( () =>{
    // lets reload the users in the databse each half a second 
         
    // console.log("Xml htttp request loaded");
    let xhr = new XMLHttpRequest(); // new XML Http request 
    xhr.open("GET" , "/php_files/users.php" , true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                contacts.innerHTML=data;
                
            }
        }  
    }
    xhr.send();
    // data reloaded successfully 


} , 500 );




