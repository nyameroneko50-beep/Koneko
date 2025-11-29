const form = document.getElementById("regForm");
const clearBtn = document.getElementById("clearBtn");

// Toggle Password Eye Button
function togglePassword(id, btn) {
    let input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
        btn.textContent = "🙈";
    } else {
        input.type = "password";
        btn.textContent = "👁";
    }
}

form.addEventListener("submit", function(e) {
    let error = false;

    // USERNAME
    let user = document.getElementById("username");
    if (user.value.trim() === "") {
        user.style.borderColor = "red";
        document.getElementById("userErr").textContent = "Username required";
        error = true;
    } else if (user.value.length < 4) {
        user.style.borderColor = "red";
        document.getElementById("userErr").textContent = "Min 4 characters";
        error = true;
    } else {
        user.style.borderColor = "green";
        document.getElementById("userErr").textContent = "";
    }

    // FULL NAME
    let name = document.getElementById("fullname");
    if (name.value.trim() === "") {
        name.style.borderColor = "red";
        document.getElementById("nameErr").textContent = "Full name required";
        error = true;
    } else {
        name.style.borderColor = "green";
        document.getElementById("nameErr").textContent = "";
    }

    // EMAIL
    let email = document.getElementById("email");
    let emailVal = email.value.trim();
    if (emailVal === "") {
        email.style.borderColor = "red";
        document.getElementById("emailErr").textContent = "Email required";
        error = true;
    } else if (!emailVal.includes("@") || !emailVal.includes(".")) {
        email.style.borderColor = "red";
        document.getElementById("emailErr").textContent = "Invalid email";
        error = true;
    } else {
        email.style.borderColor = "green";
        document.getElementById("emailErr").textContent = "";
    }

    // GENDER
    let g1 = document.querySelector('input[name="gender"]:checked');
    if (!g1) {
        document.getElementById("genderErr").textContent = "Please select gender";
        error = true;
    } else {
        document.getElementById("genderErr").textContent = "";
    }

    // PASSWORD
    let pass = document.getElementById("password");
    if (pass.value.trim() === "") {
        pass.style.borderColor = "red";
        document.getElementById("passErr").textContent = "Password required";
        error = true;
    } else if (pass.value.length < 5) {
        pass.style.borderColor = "red";
        document.getElementById("passErr").textContent = "At least 5 characters";
        error = true;
    } else {
        pass.style.borderColor = "green";
        document.getElementById("passErr").textContent = "";
    }

    // CONFIRM PASSWORD
    let confirm = document.getElementById("confirm");
    if (confirm.value.trim() === "") {
        confirm.style.borderColor = "red";
        document.getElementById("confirmErr").textContent = "Confirm password";
        error = true;
    } else if (confirm.value !== pass.value) {
        confirm.style.borderColor = "red";
        document.getElementById("confirmErr").textContent = "Password doesn't match";
        error = true;
    } else {
        confirm.style.borderColor = "green";
        document.getElementById("confirmErr").textContent = "";
    }

    // STOP IF ERRORS
    if (error) {
        e.preventDefault();
        return;
    }

    // SUCCESS POPUP THEN SUBMIT
    e.preventDefault();
    document.getElementById("successBox").style.display = "block";

    setTimeout(() => form.submit(), 1200);
});

// CLEAR BUTTON
clearBtn.addEventListener("click", () => {
    document.querySelectorAll("input").forEach(inp => {
        inp.value = "";
        inp.style.borderColor = "#ccc";
    });
    document.querySelectorAll(".error").forEach(x => x.textContent = "");
    document.getElementById("successBox").style.display = "none";
});
