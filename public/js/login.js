// Client-side validation on input
document.getElementById("email").addEventListener("input", function(){
    var emailInput = this.value.trim();
    var emailError = document.getElementById("emailError");
    if(emailInput === ''){
        emailError.textContent = "Email is required";
    } else if(!isValidEmail(emailInput)){
        emailError.textContent = "Invalid Email Address"
    } else {
        emailError.textContent = '';
    }
});

function isValidEmail(email){
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    return pattern.test(email);
}

document.getElementById('password').addEventListener('input',function(){
    var passwordInput = this.value.trim();
    var passwordError =  document.getElementById('passwordError');
    if(passwordInput === ''){
        passwordError.textContent = 'Password is required';
        return false;
    }else if (passwordInput.length < 8){
        passwordError.textContent = 'Password needs to be 8 characters or more';
        return false;
    }else {
        passwordError.textContent = '';
    }
});

