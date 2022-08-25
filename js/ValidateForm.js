const mainForm = document.inscreption;

const fnameEl = mainForm.fname;
const lnameEl = mainForm.lname;
const usernameEl = mainForm.username;

const monthEl = mainForm.month;
const dayEl = mainForm.day;
const yearEl = mainForm.year;

const emailEl = mainForm.email;
const passwordEl = mainForm.password;
const passwordComfirmationEl = mainForm.passwordCom;

const addOptions = (parent, max, min, text) => {
    const Selectio = document.createDocumentFragment();

    const optionTitle = document.createElement("option");
    optionTitle.textContent = text;
    optionTitle.value = "";
    Selectio.append(optionTitle);
    for (let i = min; i <= max; i++) {
        const option = document.createElement("option");
        option.textContent = i;
        option.value = i;
        Selectio.append(option);
    }
    parent.append(Selectio);
};

window.addEventListener("load", () => {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    addOptions(yearEl, year, year - 50, "--Year--");
});

function setMonthvalue() {
    monthEl.value = "";
    dayEl.value = "";
}

function setVAlidDay() {
    const fullMonths = [0, 2, 4, 6, 7, 9, 11];
    dayEl.value = "";
    let max;
    if (yearEl.value !== "" && monthEl.value !== "") {
        if (monthEl.value == 1) {
            max = isLeapYear(yearEl.value) ? 29 : 28;
        } else {
            if (fullMonths.indexOf(parseInt(monthEl.value)) !== -1) {
                max = 31;
            } else max = 30;
        }
    }

    let daysOptions = dayEl.querySelectorAll("option");
    daysOptions.forEach((option) => {
        dayEl.remove(option);
    });

    addOptions(dayEl, max, 1, "--Day--");
}

function isLeapYear(year) {
    return year % 4 === 0;
}

function signIn() {
    $.ajax("./Php/Signin.php", {
        type: "POST",
        data: {
            fname: fnameEl.value,
            lname: lnameEl.value,
            username: usernameEl.value,
            email: emailEl.value,
            password: passwordEl.value,
            birthDay: yearEl.value + "-" + monthEl.value + "-" + dayEl,
        },
        success: () => {
            alert("Sigin Successfuly");
        },
        error: () => {
            alert("Zbiiii");
        },
    });
    return false;
}