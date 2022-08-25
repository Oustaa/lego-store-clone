const username = $("#username");
const password = $("#password");

$("p#SomthingWrong").hide();

function login() {
    if (!username.val() || !password.val()) return;
    $.ajax("./Php/Login.php", {
        type: "POST",
        data: {
            username: username.val(),
            password: password.val(),
        },
        success: (data) => {
            console.log(data);
            if (data == "No username") {
                $("p#SomthingWrong").text("The username you intered is invalid");
                $("p#SomthingWrong").show();
            } else if (data == false) {
                $("p#SomthingWrong").show();
                $("p#SomthingWrong").text("The Password is incorrect");
            } else {
                location.reload();
            }
            const intirval = setInterval(() => {
                $("p#SomthingWrong").hide();
                clearInterval(intirval);
            }, 3000);
        },
        error: () => {
            console.log("Somthing Went wrong");
        },
    });
}

if (loggedIn) {
    console.log("Someone logged in");
} else {
    console.log("No one is logged in");
}