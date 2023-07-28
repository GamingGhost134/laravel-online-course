document.getElementById('email').addEventListener('input', function() {
    var emailInput = this.value.trim();
    var emailError = document.getElementById('emailError');
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(emailInput === '') {
        emailError.textContent = 'Email is required';
    } else if(!emailRegex.test(emailInput)) {
        emailError.textContent = 'Email is invalid';
    }else{
        emailError.textContent = '';
    }
});
