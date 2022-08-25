import { Card } from "./createComponent";

const CatigoriesSelect = document.querySelector("select#Categories");

CatigoriesSelect.addEventListener("change", (e) => filterProducts(e));

$.ajax("./Php/getProduct.php", {
    type: "POST",
    data: { Type: "Get Catigories/Products" },
    dataType: "json",
    success: (data) => {
        console.log(data);
        for (let cat of data.categoies) {
            CatigoriesSelect.innerHTML += `<option>${cat.Category}</optio>`;
        }
        displayCard(data.data);
        $("main").toggleClass("d-none");
        $("#IsLoading").toggleClass("d-none");
    },
    error: () => {
        console.log("Somthoing Went wrong");
    },
});

function filterProducts(event) {
    $("#cardContainer").toggleClass("d-none");
    $("#IsLoading").toggleClass("d-none");
    $.ajax("./Php/getProduct.php", {
        type: "POST",
        data: {
            Type: "Get Filter Product",
            filter: event.target.value,
        },
        dataType: "json",
        success: (data) => {
            $("#cardContainer").html("");
            displayCard(data);
            $("#IsLoading").toggleClass("d-none");
            $("#cardContainer").toggleClass("d-none");
        },

        error: () => {
            console.log("Somthoing Went wrong");
        },
    });
}

function displayCard(cards) {
    for (let card of cards) {
        $("#cardContainer").append(Card(card));
    }
    $(".card").each(function() {
        $(this).on("click", function() {
            localStorage.setItem("Product-Id", $(this).attr("data-Id"));
        });
    });
}