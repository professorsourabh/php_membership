/*!
* Start Bootstrap - Landing Page v6.0.6 (https://startbootstrap.com/theme/landing-page)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-landing-page/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project


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
