const commentsContainer = $("#CommentsContainer");

const prfileComment = ({ Comment_Id, Content, Url, Title, Date }) => {
    return ` <div data-id='${Comment_Id}' class="card p-2">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid" src="${Url}" width="200px" alt="">
                    </div>
                    <div class="col-7 align-items-center">
                            <h4>${Title}</h4>
                            <p>${Content}</p>
                    </div>
                    <div class="col-1">
                        <button onclick="DeleteComment(${Comment_Id})" class="btn btn-outline-danger"><i class='bi bi-trash-fill'></i></button>
                    </div>
                </div>
            </div>`;
};

$.ajax("./Php/getProduct.php", {
    type: "POST",
    data: {
        Type: "Get Comments",
    },
    dataType: "json",
    success: (data) => {
        if (data.length > 0) {
            for (let coment of data) {
                commentsContainer.append(prfileComment(coment));
            }
        }
        console.log(data);
    },
    error: () => {
        console.log("Something Went wrong");
    },
});

function DeleteAcount() {
    const confirmation = confirm("Do You want to Delete your account");
    if (confirmation) {
        $.ajax("./Php/getProduct.php", {
            type: "POST",
            data: {
                Type: "Delete Acount",
            },
            success: () => {
                location.href = "./index.php";
            },
            error: () => {
                console.log("Something Went wrong");
            },
        });
    }
}

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

            // if (commentsContainer.children().length < 1) {
            //     commentsContainer.append(NoComment());
            // }
        },
    });
}

// Chnage Profile Img

const imgs = $("#imgs");
const img = $("#ProfilImg");

imgs.hide();

function showImgs() {
    imgs.show();
}
let click = 0;

function changeImg(element) {
    img.attr("src", element.src);
    if (click === 0) {
        $("#imgs").append(
            `<button onclick="saveChanges()" class="btn btn-success mt-3">Save Changes</button>`
        );
        click++;
    }
}

for (let i = 1; i < 14; i++) {
    const imgUrl = `./Imgs/usersImgs/Avatar${i}.png`;
    if (img.attr("src") == imgUrl) continue;
    $("#imgs>.row").append(`<div class='col-3'>
                                <img src='./Imgs/usersImgs/Avatar${i}.png' onclick='changeImg(this)' class='img-fluid rounded' alt=''>
                            </div>`);
}

function saveChanges() {
    console.log(img.attr("src"));
    $.ajax("./Php/getProduct.php", {
        type: "POST",
        data: {
            Type: "ChangeUserImg",
            url: img.attr("src"),
        },
        success: () => {
            location.href = "./Profil.php";
        },
        error: () => {
            console.log("Somthing Went Wrong");
        },
    });
}