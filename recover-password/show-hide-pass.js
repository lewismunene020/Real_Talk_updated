
function show_hide_pass(password_input){

    let toggle_btn = select_query('#show-hide-icon');
    toggle_btn.classList.toggle('fa-eye');
    toggle_btn.classList.add('fa-eye-slash');
    let pass = select_query(password_input)
            if(pass.type== "password"){
                pass.type="text";
            }
            else{
                pass.type="password";
            }
        

}
