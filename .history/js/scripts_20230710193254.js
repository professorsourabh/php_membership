const form=document.getElementById('form');
const user=document.getElementById('name');
const email=document.getElementById('email');
const last_name=document.getElementById('last_name');
const first_name=document.getElementById('first_name');
const password=document.getElementById('password');
const confirm_password=document.getElementById('confirm_password');
alert('heello');

form.addEventListener('submit', e =>{
    e.preventDefault();
    validateInputs();

});

const setError = (element,message)=>{
    const inputControl =element.parentElement;
    const errorDisplay =inputControl.querySelector('.error');

    errorDisplay.innerHTML=message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl =element.parentElement;
    const errorDisplay =inputControl.querySelector('.error');

    errorDisplay.innerHTML='';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

const isValidEmail = email =>{
    const re =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () =>{
    const userValue = user.value.trim();
    const emailValue=email.value.trim();
    const confirm_passwordValue=confirm_password.value.trim();
    const passwordValue=password.value.trim();
    const first_nameValue=first_name.value.trim();
    const last_nameValue=last_name.value.trim();

    if(userValue === ''){
        setError(user,'Username is required');
    }
    else{
        setSuccess(user);
    }

    if(emailValue === ''){
        setError(email,'email is required');
    } else if(!isValidEmail(emailValue)){
        setError(email,'Provide a valid email address');
    } else{
        setSuccess(email);
    }

    if(passwordValue === ''){
        setError(password,'password is required');
    } else if (passwordValue.length < 8){
        setError(password,'Password must be at least 8 character.')
    }else{
        setSuccess(password);
    }

    if(confirm_password === ''){
        setError(confirm_password,'password is required');
    } else if (confirm_password !== passwordValue){
        setError(confirm_password,"Password doesn't match.");
    }else{
        setSuccess(confirm_password);
    }
};


function togglePasswordVisibility(icon, inputId) {
    const passwordInput = document.getElementById(inputId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = "password";
        icon.innerHTML = '<i class="fas fa-eye"></i>';
    }
}

    




