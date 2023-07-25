// Client-side validation on input
document.getElementById('name').addEventListener('input', function () {
    var nameInput = this.value.trim();
    var nameError = document.getElementById('nameError');
    if (nameInput === '') {
        nameError.textContent = 'Name is required';
    } else {
        nameError.textContent = '';
    }
});

document.getElementById('email').addEventListener('input', function () {
    var emailInput = this.value.trim();
    var emailError = document.getElementById('emailError');
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (emailInput === '') {
        emailError.textContent = 'Email is required';
    } else if (!emailRegex.test(emailInput)) {
        emailError.textContent = 'Invalid email address';
    } else {
        emailError.textContent = '';
    }
});

document.getElementById('password').addEventListener('input', function () {
    var passwordInput = this.value.trim();
    var passwordError = document.getElementById('passwordError');
    if (passwordInput === '') {
        passwordError.textContent = 'Password is required';
    } else if (passwordInput.length < 8) {
        passwordError.textContent = 'Password must be at least 8 characters';
    } else {
        passwordError.textContent = '';
    }
});

document.getElementById('confirmPassword').addEventListener('input', function () {
    var confirmPasswordInput = this.value.trim();
    var confirmPasswordError = document.getElementById('confirmPasswordError');
    var passwordInput = document.getElementById('password').value.trim();
    if (confirmPasswordInput === '') {
        confirmPasswordError.textContent = 'Confirm password is required';
    } else if (confirmPasswordInput !== passwordInput) {
        confirmPasswordError.textContent = 'Passwords do not match';
    } else {
        confirmPasswordError.textContent = '';
    }
});
