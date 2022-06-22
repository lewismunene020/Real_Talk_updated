function select_query(value){
    var x = document.querySelector(value);
    return x;
}

function select_all(query){
    return document.querySelectorAll(query);
}


// displays password partially during typing 

function display_password_partially(input_id){
    let pass = select_query(input_id);
    pass.onkeydown =() =>{
        pass.type="text";

    }
    pass.onkeyup=()=>{
        pass.type="password";
    }
}

// preventing automatic form submitting 

function prevent_form_auto_submitting(form_id){
    let form = select_query(form_id);
    form.onsubmit = (e) => {
        e.preventDefault();
    }

}


function redirect_to_link(clicked , link){
    let about_links =select_all(clicked);
    about_links.forEach(about=>{
    about.onclick=() =>{
      
        location.href=link;
    }
    
    })
}



// element displayer 
function display_element_on_click(clicked_elem , elem_to_display){
    if(clicked_elem.includes('#')){
        let x =select_query(clicked_elem);
        let y = select_query(elem_to_display);
        x.onclick=()=>{
            y.style.display="block";
        }
    }
    
    else{
        let x =document.querySelectorAll(clicked_elem);
        let y = select_query(elem_to_display);
        x.forEach(elem =>{
            elem.onclick=()=>{
                y.style.display="block";
            }
        });
    }

    
}


function form_creator(form_class){
    let myForm = document.createElement('form');
    myForm.classList.add(form_class);
    return myForm;
}




function ajax_connector(upload_btn =null, form_id , file_php_path , error_indicator ,method="POST"){
    function select_query(path){var x = document.querySelector(path); return x;}
    var file_form;
    // checking form id
    if(form_id == null){
        file_form = form_creator('data_fetch-form');
    }
    else{
        file_form = select_query(form_id);
    }
     
    var php_path = file_php_path;
    var error_display= select_query(error_indicator);


    file_form.onsubmit = (e) => {
        e.preventDefault();
    }

    
    if(!(upload_btn== null) ){
        let upload_button = select_query(upload_btn);

        upload_button.onclick =()=>{
         
                let xhr = new XMLHttpRequest();
                xhr.open(method ,php_path);
                xhr.onload =() =>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data  = xhr.response;
                            error_display.style.display="block";
                            error_display.innerHTML=data;
                        }
                    }
                }
                let formData = new FormData(file_form);
                xhr.send(formData);
            
        }
       
    }

    // for fetching data from database
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
                            console.log(data);
                        }
                    }
                }
                let formData = new FormData(file_form);
                xhr.send(formData);
            },2000);
    
        
    
    }
}


