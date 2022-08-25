const QteArea = $("#Qte");
const commentContainer = $("#Comments");
const CommentText = $("#Comment-text");

let Comments = [];

let start = 0;
let end = 4;

const Card = ({ Title, Url, Price, text, Product_Id }) => {
    return `<div  class="col-6 col-lg-3 py-4"> 
        <a href="./Product.php" data-Id="${Product_Id}" class="card">
        <img src=${Url} alt="" class="card-img-top">
        <div class="card-header d-flex justify-content-between"><p class="card-tite">${Title}</p>
        <p class="card-titl">${Price}$</p></div><div class="card-body"><p>${text.slice(
    0,
    70
  )} ....</p></div></a></div>`;
};

const Comment = ({ Comment_Id, Content, Date, Username, img, User_Id }) => {
        console.log(img);
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

const NoComment = () => {
  return `<div id="NoComments" class="card mt-3 p-4 text-center">
                            <h2 class="display-6 text-center">OOPS!</h2>
                            <p>It Seems That This Product Has No Comment Be The First To Add A Comment.</p>
                        </div>`;
};

const moreCommentsBtn = () => {
  return `<div class="d-flex justify-content-center mt-4">
                <button onclick="MoreComment(this)" class="btn btn-primary"><i class="bi bi-three-dots"></i></button>
            </div>`;
};

// Change Image On Click
const Bg_Img = $("#img_Bg");

$("img.img-fluid").each(function () {
  $(this).on("click", () => {
    Bg_Img.attr("src", $(this).attr("src"));
  });
});

let Qte_Stock;

// Display Product Info

$.ajax("./Php/getProduct.php", {
  type: "POST",
  data: {
    Type: "Get Product Info",
    productId: localStorage.getItem("Product-Id"),
  },
  dataType: "json",
  success: (data) => {
    console.log(data);
    document.title = "LEGO Store | " + data.info.Title;
    Bg_Img.attr("src", data.imgs[0].Url);
    const imgs = $("img.small-img");
    imgs.each(function (index) {
      $(this).attr("src", data.imgs[index].Url);
    });

    $("#Title").html(data.info.Title);
    $("#Category").html(data.info.Category);
    $("#price").html(Number(data.info.Price).toFixed(2) + "$");

    Qte_Stock = data.info.Qte_Stock;

    for (let card of data.CatTest) {
      if (card.Product_Id == localStorage.getItem("Product-Id")) continue;
      $("#Recommended").append(Card(card));
    }
    $(".card").each(function () {
      $(this).on("click", function () {
        localStorage.setItem("Product-Id", $(this).attr("data-Id"));
      });
    });
    $("main").toggleClass("d-none");
    $("#IsLoading").toggleClass("d-none");

    $("#AddToCardBtn").click(() => {
      if (QteArea.text() == 0) return;
      if (loggedIn) {
        $.ajax("./Php/getProduct.php", {
          type: "POST",
          data: {
            Type: "Add Product",
            id: localStorage.getItem("Product-Id"),
            qte: Number(QteArea.text()),
          },
          success: (data) => {
            console.log(data);
          },
          error: (errorMessa) => {
            console.log("Item Not Added");
          },
        });
      } else {
        const cardItems = localStorage.getItem("CardItems")
          ? JSON.parse(localStorage.getItem("CardItems"))
          : {};

        if (data.info.Product_Id in cardItems) {
          cardItems[data.info.Product_Id]["qte"] += Number(QteArea.text());
          if (cardItems[data.info.Product_Id]["qte"] > data.info.Qte_Stock)
            cardItems[data.info.Product_Id]["qte"] = Qte_Stock;
        } else {
          cardItems[data.info.Product_Id] = {
            data: data.info,
            qte: Number(QteArea.text()),
            Url: data.imgs[0].Url,
          };
        }

        $.ajax("./Php/getProduct.php", {
          type: "POST",
          data: { Type: "AddToCard" },
        });

        localStorage.setItem("CardItems", JSON.stringify(cardItems));
      }
      QteArea.text(0);
    });
    Comments = data.Comments;
    displayComments(Comments);
  },
  error: () => {
    console.log("Somthing Went wrong");
  },
});

// Add To Card

function plus() {
  let Qte = Number(QteArea.html()) + 1;
  if (Qte > Number(Qte_Stock)) Qte--;
  QteArea.html(Qte);
}

function minus() {
  let Qte = Number(QteArea.html()) - 1;
  if (Qte < 0) Qte++;
  QteArea.html(Qte);
}

// COMMENTS HANDLING

// DISPLAY COMMNETS
function displayComments(Comments, start = 0, end = 4) {
  if (Comments.length) {
    if (Comments.length < end) end = Comments.length % end;
    for (let i = start; i < end; i++) {
      const comment = Comments[i];
      commentContainer.append(Comment(comment));
    }
    if (Comments.length - start > 4) commentContainer.append(moreCommentsBtn());
    // for (let comment of Comments) {
    //   commentContainer.append(Comment(comment));
    // }
  } else {
    commentContainer.append(NoComment());
  }
}
// ADD COMMENTS

$("#CommentBtn").on("click", () => {
  if (CommentText.val() == "") return;
  $.ajax("./Php/getProduct.php", {
    type: "POST",
    data: {
      Type: "Add Comment",
      productId: localStorage.getItem("Product-Id"),
      Content: CommentText.val().replaceAll("\n", "<br>"),
    },
    dataType: "json",
    success: (data) => {
      commentContainer.append(
        Comment({ ...data, img: userImg, Username, User_Id: userId })
      );
      CommentText.val("");
      $("#NoComments").remove();
    },
  });
});

// Dellet Comment

function DeleteComment(id) {
  const comment = $(`div[data-id=${id}]`);

  $.ajax("./Php/getProduct.php", {
    type: "POST",
    data: {
      Type: "Delete Comment",
      commentId: id,
    },
    success: () => {
      comment.remove();

      if (commentContainer.children().length < 1) {
        commentContainer.append(NoComment());
      }
      start += 1;
      end += 1;
      displayComments(Comments, start, end);
    },
  });
}

function MoreComment(element) {
  start += 4;
  end += 4;

  displayComments(Comments, start, end);

  const parent = element.parentNode;
  const grandParent = parent.parentNode;
  grandParent.removeChild(parent);
}