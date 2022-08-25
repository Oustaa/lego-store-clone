export const Category = (category) => {
    return `<div id="${category.Category.split(" ").join(
    "_"
  )}" class="row" data-name="${category.Category}">
    <header class="d-flex align-items-center justify-content-between">
    <h2 class="display-6">${category.Category}</h2>
    <a href="./Products.php?Filter=${category.Category}" >More >>></a>
    </header>
    </div>`;
};

export const Card = ({ Title, Url, Price, text, Product_Id }) => {
    // const cardElements = {
    //     card: $("<div>"),
    //     img: $("<img>"),
    //     cardHeader: $("<div>"),
    //     titleEle: $("h5"),
    //     priceEle: $("h5"),
    //     cardBody: $("<div>"),
    //     descriptionEle: $("<p>"),
    // };

    // const cardContainer = $("<div>");
    // cardContainer.addClass("col-6 col-lg-3 py-4");

    // cardElements.priceEle.html(price + "$");
    // cardElements.priceEle.addClass("card-title");

    // cardElements.titleEle.html(title);
    // cardElements.titleEle.addClass("card-title");

    // cardElements.descriptionEle.html(disc);
    // cardElements.descriptionEle.addClass("card-text");

    // cardElements.cardHeader.addClass(
    //     "card-header d-flex justify-content-between"
    // );

    // cardElements.cardHeader.append(cardElements.titleEle);

    // cardContainer.append(cardElements.cardHeader);

    return `<div  class="col-6 col-lg-3 py-4"> 
        <a href="./Product.php" data-Id="${Product_Id}" class="card">
        <img src=${Url} alt="" class="card-img-top">
        <div class="card-header d-flex justify-content-between"><p class="card-tite">${Title}</p>
        <p class="card-titl">${Price}$</p></div><div class="card-body"><p>${text.slice(
    0,
    70
  )} ....</p></div></a></div>`;
};

export const CartCard = ({ name, imgs, price, id, Category }) => {
    return ``;
};

export const Comment = ({
        Comment_Id,
        Content,
        Date,
        Username,
        img,
        User_Id,
    }) => {
        return `<div data-id="${Comment_Id}" class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-2">
                            <img src="${img}" width="60px" alt="" class="img-fluid">
                        </div>
                        <div class="col d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">${Username}</h5>
                                <p class="card-title">${Date}</p>
                            </div>
                            ${
                              userId == User_Id
                                ? `<button data-id="${Comment_Id}" onclick='DeleteComment(${Comment_Id})' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button>`
                                : ""
                            }
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <p>${Content}</p>
                </div>
            </div>`;
};