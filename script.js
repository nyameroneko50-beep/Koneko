document.getElementById("regForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let name = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let user = document.getElementById("username").value.trim();
    let pass = document.getElementById("password").value;
    let confirm = document.getElementById("confirmPassword").value;
    let id = document.getElementById("studentid").value.trim();
    let course = document.getElementById("course").value;

    let errorMsg = document.getElementById("errorMsg");

    // Check empty fields
    if (!name || !email || !user || !pass || !confirm || !id || !course) {
        errorMsg.textContent = "Please complete all fields.";
        return;
    }

    // Email check
    let emailCheck = /\S+@\S+\.\S+/;
    if (!emailCheck.test(email)) {
        errorMsg.textContent = "Invalid email.";
        return;
    }

    // Username must be 4+ chars
    if (user.length < 4) {
        errorMsg.textContent = "Username must be at least 4 characters.";
        return;
    }

    // Password rules
    if (pass.length < 6) {
        errorMsg.textContent = "Password must be at least 6 characters.";
        return;
    }

    if (pass !== confirm) {
        errorMsg.textContent = "Passwords do not match.";
        return;
    }

    // Student ID numeric
    if (isNaN(id)) {
        errorMsg.textContent = "Student ID must be numbers only.";
        return;
    }

    // Passed all checks
    errorMsg.textContent = "";

    document.getElementById("popup").style.display = "flex";

    document.getElementById("closePopup").onclick = () => {
        document.getElementById("popup").style.display = "none";
        this.submit();
    };
});
