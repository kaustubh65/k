document.getElementById("registrationForm").addEventListener("submit", (event)=> {

    event.preventDefault(); // Prevent default form submission
    
    // Fetching input values
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    
    // Resetting previous error messages
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    
    // Username validation
    if (username.trim() === "") {
        document.getElementById("usernameError").innerHTML = "Username is required";
        return;
    }else if(username.trim().length < 7 ) {
        document.getElementById("usernameError").innerHTML = "Username should be of min 7 character";
        return;
    }
    
    // Email validation
    if (email.trim() === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        return;
    } else if (email.trim().length < 8 ) {
        document.getElementById("emailError").innerHTML = "Email should be of min 8 character";
        return;
    }
    
    // Password validation
    if (password.trim() === "") {
        document.getElementById("passwordError").innerHTML = "Password is required";
        return;
    }
    else if(password.trim().length < 8 ) {
        document.getElementById("passwordError").innerHTML = "Password should be of min 8 character";
        return;
    }
    
    // Form submission allowed if all validations pass
    // Here you can proceed with form submission to server
    alert("Form submitted successfully! \n Welcome "+username);
    
});

// Email format validation function
// function isValidEmail(email) {
//     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     return emailRegex.test(email);
// }
