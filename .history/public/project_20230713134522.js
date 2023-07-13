

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

       
       var passwordInput = document.getElementById('password');
       var confirmPassInput = document.getElementById('ConfirmPassword');
       
       // Add an event listener to the confirm password input field
       confirmPassInput.addEventListener('input', function() {
         // Get the entered passwords
         var password = passwordInput.value;
         var confirmPass = confirmPassInput.value;
         console.log(password+' and '+ confirmPass);
         // Perform the validation
         if (password === confirmPass) {
           // Passwords match
           confirmPassInput.setCustomValidity('');
         } else {
           // Passwords do not match
           confirmPassInput.setCustomValidity('Passwords do not match');
         }
       });
       