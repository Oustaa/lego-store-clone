function logIn() {
    $.ajax("./Php/login.php", {
        type: "POST",
        data: {
            username: document.querySelector("input[name=username]").value,
            password: document.querySelector("input[name=password]").value,
        },
        success: (data) => {
            if (data == false) {
                alert("Your can't log in sorry");
            } else {
                alert("Your are Logged in");
                window.open("acount.html", (target = "_self"));
            }
        },
        error: (errorMessage) => {
            console.log("Your can't log in sorry " + errorMessage);
        },
    });
    return false;
}

// console.log("Zbii");