var password = document.getElementById("user_password"),
    confirm_password = document.getElementById("verify_user_password");

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("The passwords do not match. Please re-enter.");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;