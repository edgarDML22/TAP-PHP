document.addEventListener("DOMContentLoaded", function () {
    const password = sessionStorage.getItem("signup_password");
    const confirmPassword = sessionStorage.getItem("signup_confirm_password");

    if (password) {
        document.getElementById("pass").value = password;
    }

    if (confirmPassword) {
        document.getElementById("confirm_pass").value = confirmPassword;
    }

    const form = document.querySelector("form");
    form.addEventListener("submit", function () {
        const pass = document.getElementById("pass").value;
        const confirmPass = document.getElementById("confirm_pass").value;

        sessionStorage.setItem("signup_password", pass);
        sessionStorage.setItem("signup_confirm_password", confirmPass);
    });
});
