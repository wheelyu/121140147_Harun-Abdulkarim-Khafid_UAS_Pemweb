// script.js
document.getElementById("form").addEventListener("submit", function (event) {
    event.preventDefault();
    checkForm();
});

function checkForm() {
    // Validasi username
    const usernameInput = document.getElementById("username");
    if (usernameInput.value.trim() === "") {
        setError(usernameInput, "Username tidak boleh kosong");
    } else {
        setSuccess(usernameInput);
    }

    // Validasi password
    const passwordInput = document.getElementById("password");
    if (passwordInput.value.trim() === "") {
        setError(passwordInput, "Password tidak boleh kosong");
    } else {
        setSuccess(passwordInput);
    }

    // Validasi konfirmasi password
    const password2Input = document.getElementById("password2");
    if (password2Input.value.trim() === "" || password2Input.value !== passwordInput.value) {
        setError(password2Input, "Konfirmasi password tidak sesuai");
    } else {
        setSuccess(password2Input);
    }
}

function setError(input, message) {
    const formControl = input.parentElement;
    formControl.className = "form-control error";
    const small = formControl.querySelector("small");
    small.innerText = message;
}

function setSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
}
