function togglePass(id) {
    let field = document.getElementById(id);
    field.type = field.type === "password" ? "text" : "password";
}

function clearForm() {
    document.getElementById("regForm").reset();
    document.querySelectorAll("input").forEach(i => {
        i.classList.remove("valid", "invalid");
    });
    document.querySelectorAll(".error").forEach(e => e.textContent = "");
}

document.getElementById("regForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let isValid = true;

    let username = document.getElementById("username");
    let fullname = document.getElementById("fullname");
    let email = document.getElementById("email");
    let phone = document.getElementById("phone");
    let password = document.getElementById("password");
    let cpassword = document.getElementById("cpassword");
    let gender = document.querySelector("input[name='gender']:checked");

    // Username
    if (username.value.trim() === "") {
        username.classList.add("invalid");
        document.getElementById("userError").textContent = "This field is required";
        isValid = false;
    } else {
        username.classList.replace("invalid", "valid");
        document.getElementById("userError").textContent = "";
    }

    // Full name
    if (fullname.value.trim() === "") {
        fullname.classList.add("invalid");
        document.getElementById("nameError").textContent = "Full name is required";
        isValid = false;
    } else {
        fullname.classList.replace("invalid", "valid");
        document.getElementById("nameError").textContent = "";
    }

    // Email
    if (!email.value.includes("@") || !email.value.includes(".")) {
        email.classList.add("invalid");
        document.getElementById("emailError").textContent = "Enter a valid email";
        isValid = false;
    } else {
        email.classList.replace("invalid", "valid");
        document.getElementById("emailError").textContent = "";
    }

    // ⭐ Phone Number
    if (phone.value.trim() === "") {
        phone.classList.add("invalid");
        document.getElementById("phoneError").textContent = "Phone number is required";
        isValid = false;
    } else if (!/^[0-9]{10,11}$/.test(phone.value)) {
        phone.classList.add("invalid");
        document.getElementById("phoneError").textContent = "Enter 10–11 digits only";
        isValid = false;
    } else {
        phone.classList.replace("invalid", "valid");
        document.getElementById("phoneError").textContent = "";
    }

    // Gender
    if (!gender) {
        document.getElementById("genderError").textContent = "Please choose a gender";
        isValid = false;
    } else {
        document.getElementById("genderError").textContent = "";
    }

    // Password
    if (password.value.length < 6) {
        password.classList.add("invalid");
        document.getElementById("passError").textContent = "Minimum 6 characters";
        isValid = false;
    } else {
        password.classList.replace("invalid", "valid");
        document.getElementById("passError").textContent = "";
    }

    // Confirm Password
    if (cpassword.value !== password.value) {
        cpassword.classList.add("invalid");
        document.getElementById("cpassError").textContent = "Passwords do not match";
        isValid = false;
    } else {
        cpassword.classList.replace("invalid", "valid");
        document.getElementById("cpassError").textContent = "";
    }

    // SUCCESS
    if (isValid) {
        document.getElementById("popup").style.right = "20px";
        setTimeout(() => {
            document.getElementById("popup").style.right = "-300px";
        }, 3000);

        this.submit();
    }
});
