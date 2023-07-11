const form=document.getElementById('form');
const user=document.getElementById('name');
const email=document.getElementById('email');
const last_name=document.getElementById('last_name');
const first_name=document.getElementById('first_name');
const password=document.getElementById('password');
const confirm_password=document.getElementById('confirm_password');


form.addEventListener('submit',e=>{
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

    




