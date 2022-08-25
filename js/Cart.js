const IsLoading = $("#IsLoading");
const cardItems = $("#cardItems");
const main = $("main");
main.toggleClass("d-none");

const cartCard = ({ Category, Price, Product_Id, Title, Url, qte }) => {
    return `<div class="card p-2" data-id=${Product_Id}>
             <div class="row">
               <div class="col-3">
                 <img src="${Url}" class="img-fluid" alt="">
               </div>
               <div class="col-6 d-flex flex-column justify-content-between">
                 <p class="text-muted">${Category}</p>
                 <h5 class="">${Title}</h5>
                 <p class="text-muted">Qte: ${qte}</p>
               </div>
               <div class="col-3 d-flex flex-column justify-content-between">
                 <h5 class="text-end">${Price} $</h5>
                 <button onclick="deleteItemLS(${Product_Id})" class="btn-danger btn"><i class="bi bi-trash-fill"></i></button>
               </div>
             </div>
           </div>`;
};

const EmptyCart = () => {
    return `<div class="card p-2">
                            <h4 class="card-title">Your Card is Empty</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum perferendis odio, autem magnam itaque consectetur aut ipsum, ab voluptates recusandae sint aliquam, officiis iusto. Sapiente.</p>
                            <a class="btn btn-primary" href="./Products.php">Start Shoping Now</a>
                        </div>`;
};

function displayPrices(obj) {
    console.log("Prices Displayed");
    let items = null;
    try {
        items = Object.values(obj);
    } catch {
        items = obj;
    }

    let totalPrice = 0;
    let finalPrice = 0;

    for (let item of items) {
        try {
            item.Price = item.data.Price;
        } catch {}
        totalPrice += Number(item.Price) * Number(item.qte);
    }

    finalPrice = totalPrice * 0.85;
    $("#totalPrice").text(totalPrice.toFixed(2) + "$");
    $("#finalPrice").text(finalPrice.toFixed(2) + "$");
    $("#TVA").text((totalPrice - finalPrice).toFixed(2) + "$");
}

function displayItems(refrish = true) {
    cardItems.text("");
    if (loggedIn) {
        $.ajax("./Php/getProduct.php", {
            type: "POST",
            data: {
                Type: "Get Cart Product Info",
            },
            dataType: "json",
            success: (data) => {
                console.log(data);
                if (data.length !== 0) {
                    for (let key in Object.keys(data)) {
                        cardItems.append(cartCard(data[key]));
                    }
                } else {
                    cardItems.append(EmptyCart());
                }
                displayPrices(data);
            },
            error: () => {
                console.log("Somthing Went wrong");
            },
        });
    } else {
        const itemsInCard = JSON.parse(localStorage.getItem("CardItems")) || {};
        console.log(itemsInCard);
        if (Object.keys(itemsInCard).length !== 0) {
            for (let key of Object.keys(itemsInCard)) {
                const itemInfo = itemsInCard[key];
                cardItems.append(
                    cartCard({
                        ...itemInfo["data"],
                        Url: itemInfo.Url,
                        qte: itemInfo["qte"],
                    })
                );
            }
            displayPrices(JSON.parse(localStorage.getItem("CardItems")));
        } else {
            cardItems.append(EmptyCart());
        }
    }
    if (refrish === true) {
        console.log("Refrished");
        main.toggleClass("d-none");
        IsLoading.toggleClass("d-none");
    }
}

// $.ajax("./Php/getProduct.php", {
//     type: "POST",
//     data: {
//         Type: "Get Cart Product Info",
//     },
//     dataType: "json",
//     success: (data) => {
//         console.log(data);
//         if (data !== false) {
//             for (let key in Object.keys(data)) {
//                 cardItems.append(cartCard(data[key]));
//             }
//         } else {
//             const itemsInCard = JSON.parse(localStorage.getItem("CardItems")) || {};

//             if (Object.keys(itemsInCard).length !== 0) {
//                 for (let key of Object.keys(itemsInCard)) {
//                     const itemInfo = itemsInCard[key];
//                     cardItems.append(
//                         cartCard({
//                             ...itemInfo["data"],
//                             Url: itemInfo.Url,
//                             qte: itemInfo["qte"],
//                         })
//                     );
//                 }
//                 displayPrices(JSON.parse(localStorage.getItem("CardItems")));
//             } else {
//                 cardItems.append(EmptyCart());
//             }
//         }

//         main.toggleClass("d-none");
//         IsLoading.toggleClass("d-none");
//     },
//     error: () => {
//         console.log("Somthing Went wrong");
//     },
// });

// Object.keys(JSON.parse(localStorage.getItem("Product-Id")));

function deleteItemLS(id) {
    if (loggedIn) {
        $.ajax("./Php/getProduct.php", {
            type: "POST",
            data: {
                Type: "Delete Product",
                id,
                user_id: userId,
            },
            dataType: "json",

            success: (data) => {
                displayPrices(data);
                displayItems((refrish = false));

                // displayItems();
                // return data;
            },
            error: (jqXhr, textStatus, errorMessage) => {
                console.log("Error" + errorMessage);
            },
        });
    } else {
        const items = JSON.parse(localStorage.getItem("CardItems"));
        delete items[id];
        const parent = $(`div[data-id=${id}]`);
        parent.remove();

        if (Object.keys(items).length === 0) {
            cardItems.append(EmptyCart());
        }

        localStorage.setItem("CardItems", JSON.stringify(items));
        displayPrices(JSON.parse(localStorage.getItem("CardItems")));
    }
}

displayItems();