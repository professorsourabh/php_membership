function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = passwordInput.nextElementSibling;

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = "password";
        eyeIcon.innerHTML = '<i class="fas fa-eye"></i>';
    }
}
