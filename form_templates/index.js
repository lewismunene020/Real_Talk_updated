function select_all(identity){
    return document.querySelectorAll(identity);
}

function select_query(elem_identity) {
    return document.querySelector(elem_identity);
}


function prevent_form_reload(form_identity){
    let form = select_query(form_identity);
    form.onsubmit= (e) =>{
        e.preventDefault();
    }
}

// set a function tha can add multiple clasess to an element using javascript 
function add_classes(element_to_add_class ,classes_array){
    let elem  = select_query(element_to_add_class);
    
    let len = classes_array.length;
    let i=0;
    while(i<len){
        elem.classList.add(classes_array[i]);
    }
}

let submit_btn = select_query('#submit-btn');
submit_btn.onclick = () =>{
    let input_value = select_query('.first-name').value.trim();
    let input_control = select_query('.first-name-validation ');
    let form_control = select_query('.first-name-form-control');

    if(input_value == ""){

        form_control.classList.add('error');
        input_control.classList.add('fa-exclamation-circle')
        input_control.classList.add('error-circle')
      

    }
    else{
        form_control.classList.add('success');
        input_control.classList.add('fa-check-circle')
        input_control.classList.add('valid-circle')
      
    }
}

// function validate_form(submit_btn , input_fields){

// }





