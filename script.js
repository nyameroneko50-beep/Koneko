document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Reset error messages
        resetErrors();

        // Validate form
        if (validateForm()) {
            // Submit the form
            form.submit();
        }
    });

    function validateForm() {
        let isValid = true;

        // Name validation
        isValid = isValid && validateName();

        // Email validation
        isValid = isValid && validateEmail();

        // Password validation
        isValid = isValid && validatePassword();

        // Confirm Password validation
        isValid = isValid && validateConfirmPassword();

        return isValid;
    }

    function validateName() {
        const nameInput = document.getElementById('name');
        const nameErr = document.getElementById('nameErr');

        if (nameInput.value.trim() === '') {
            nameErr.textContent = 'Name is required';
            return false;
        } else {
            nameErr.textContent = '';
            return true;
        }
    }

    function validateEmail() {
        const emailInput = document.getElementById('email');
        const emailErr = document.getElementById('emailErr');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(emailInput.value)) {
            emailErr.textContent = 'Invalid email format';
            return false;
        } else {
            emailErr.textContent = '';
            return true;
        }
    }

    function validatePassword() {
        const passwordInput = document.getElementById('password');
        const passwordErr = document.getElementById('passwordErr');

        if (passwordInput.value.length < 8) {
            passwordErr.textContent = 'Password must be at least 8 characters';
            return false;
        } else {
            passwordErr.textContent = '';
            return true;
        }
    }

    function validateConfirmPassword() {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const confirmPasswordErr = document.getElementById('confirmPasswordErr');

        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordErr.textContent = 'Passwords do not match';
            return false;
        } else {
            confirmPasswordErr.textContent = '';
            return true;
        }
    }

    function resetErrors() {
        document.querySelectorAll('.error').forEach(function(error) {
            error.textContent = '';
        });
    }
});
