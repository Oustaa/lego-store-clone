import { Card, Category } from "./createComponent";

// for (var product of Products) {
//     $("main").append(Card(product));
// }

$(document).ready(() => {
    $(".card").each(function() {
        $(this).on("click", () => {
            getProduct($(this).attr("data-Id"));
        });
    });
});

function getProduct(id) {
    $.ajax("./Php/index.php", {
        type: "POST",
        data: {
            requist_type: "Get Cities",
            id: id,
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
        },
        error: function(errorMessage) {
            console.log(errorMessage);
        },
    });
}

$.ajax("./Php/getProduct.php", {
    type: "POST",
    data: { Type: "Get Catigories/Products" },
    dataType: "json",
    success: (data) => {
        console.log(data);
        for (var c of data.categoies) {
            $("main").append(Category(c));
        }
        const Architectur = $("[data-name='LEGO Architectur']");
        const Technic = $("[data-name='LEGO Technic']");
        const Minecraft = $("[data-name='LEGO Minecraft']");

        let parent;
        for (var pro of data.data) {
            if (pro.Category === "LEGO Architectur") {
                parent = Architectur;
            } else if (pro.Category === "LEGO Technic") {
                parent = Technic;
            } else if (pro.Category === "LEGO Minecraft") {
                parent = Minecraft;
            }
            if (parent.children().length <= 4) parent.append(Card(pro));
        }
        $(".card").each(function() {
            $(this).on("click", function() {
                localStorage.setItem("Product-Id", $(this).attr("data-Id"));
            });
        });
    },
    error: (errorMessage) => {
        console.log(errorMessage);
    },
});