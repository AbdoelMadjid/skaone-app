/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Password addon Js File
*/

// Prevent paste event handler
function handlePaste(event) {
    event.preventDefault();
    alert("Pasting is not allowed in password fields.");
}

// Password addon toggle
Array.from(document.querySelectorAll("form .auth-pass-inputgroup")).forEach(function (item) {
    Array.from(item.querySelectorAll(".password-addon")).forEach(function (subitem) {
        subitem.addEventListener("click", function () {
            var passwordInput = item.querySelector(".password-input");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    });
});

// Password match validation
var password = document.getElementById("password-input"),
    confirm_password = document.getElementById("password_confirmation");

function validatePassword() {
    var passMatchText = document.getElementById("pass-match-text");
    var passMatchIcon = document.getElementById("pass-match-icon");
    var passwordMatchMessage = document.getElementById("password-match");

    if (password.value !== confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
        passMatchText.textContent = "Passwords do not match";
        passMatchText.style.color = "red";
        passMatchIcon.innerHTML = "";
        passwordMatchMessage.style.display = "block";
    } else {
        confirm_password.setCustomValidity("");
        passMatchText.textContent = "Passwords match";
        passMatchText.style.color = "blue";
        passMatchIcon.innerHTML = "&#10004;"; // Checkmark icon
        passwordMatchMessage.style.display = "block";
    }
}

// Attach event listeners for validation
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

// Show password match message when the confirm password field gains focus
confirm_password.onfocus = function() {
    document.getElementById("password-match").style.display = "block";
};

// Hide password match message when the confirm password field loses focus
confirm_password.onblur = function() {
    document.getElementById("password-match").style.display = "none";
};

// Password strength validation
var myInput = document.getElementById("password-input");
var letter = document.getElementById("pass-lower");
var capital = document.getElementById("pass-upper");
var number = document.getElementById("pass-number");
var length = document.getElementById("pass-length");

myInput.onfocus = function () {
    document.getElementById("password-contain").style.display = "block";
};

myInput.onblur = function () {
    document.getElementById("password-contain").style.display = "none";
};

myInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

    // Re-validate password match when typing in the password field
    validatePassword();
};

// Attach event listeners for validation and paste prevention
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
password.onpaste = handlePaste;
confirm_password.onpaste = handlePaste;

// Show password match message when the confirm password field gains focus
confirm_password.onfocus = function() {
    document.getElementById("password-match").style.display = "block";
};

// Hide password match message when the confirm password field loses focus
confirm_password.onblur = function() {
    document.getElementById("password-match").style.display = "none";
};
