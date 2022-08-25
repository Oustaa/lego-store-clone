<?php
session_start();


function Acountnav()
{
    $username = $_SESSION['userInfo']['Username'];
    $userImg = $_SESSION['userInfo']['img'];
    return "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle text-light' href='#' id='dropDown' role='button' data-bs-toggle='dropdown' aria-expanded='false'> $username <img src='$userImg' style='border-radius: 500px;' width='25px' alt=''></a>
                    <ul class='dropdown-menu bg-dark' aria-labelledby='dropDown'>
                        <li><a class='dropdown-item text-light' href='./Profil.php'>My Acount</a></li>
                        <li><a class='dropdown-item text-light' href='./Php/SignOut.php'>Sign out</a></li>
                    </ul>
                </li>";
}

function addCommentArea()
{
    if (!isset($_SESSION['userInfo'])) {
        return '<div class="alert alert-danger mt-4">Note: To be able to add comments log in or Sign in</div>';
    }
    return '<div  class="form mt-4">
                <div class="input-group">
                    <textarea id="Comment-text"  class="form-control"></textarea>
                    <div class="input-group-append">
                        <button id="CommentBtn" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/resets.css">

    <style>
        #Comment-text {
            resize: none;
        }
    </style>

    <link rel="shortcut icon" href="./Imgs/logo_lego.jpg" type="image/x-icon">
    <title>LEGO Store</title>
</head>

<body>
    <header class="bg-dark p-1">
        <nav class=" container d-flex justify-content-between">
            <ul class="nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-light"><img width="25px" src="./Imgs/logo_lego.jpg" alt=""> Home</a>
                </li>
                <li class="nav-item">
                    <a href="./Products.php" class="nav-link text-light">Product</a>
                </li>
                <li class="nav-item">
                    <a href="./card.php" class="nav-link text-light">Card </a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <?php
                    if (!isset($_SESSION['userInfo'])) {
                        echo "<button type='button' class='btn btn-outline-light' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='bi bi-person-circle'></i> Log in</button>";
                    } else {
                        echo Acountnav();
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </header>
    <main class="d-none">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 px-5">
                    <img id="img_Bg" class="mx-auto d-block my-4 img-fluid" src="" alt="">
                    <div class="row">
                        <div class="col-3">
                            <img class="img-fluid small-img  cursor-pointer hoverabl-border-b" src="" alt="">
                        </div>
                        <div class="col-3">
                            <img class="img-fluid small-img cursor-pointer hoverabl-border-b" src="" alt="">
                        </div>
                        <div class="col-3">
                            <img class="img-fluid small-img cursor-pointer hoverabl-border-b" src="" alt="">
                        </div>
                        <div class="col-3">
                            <img class="img-fluid small-img cursor-pointer hoverabl-border-b" src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 pt-lg-5 py-3 px-5">
                    <p id="Category" class="text-muted text-right mt-lg-5"></p>
                    <h2 id="Title" class="display-5"></h2>
                    <hr>
                    <h2 id="price" class="display-5 text-end"></h2>
                    <div class="alert alert-success text-end">In Stock</div>
                    <hr>
                    <div class="col text-end">
                        <div class="btn-group " role="group">
                            <button onclick="plus()" class="btn-primary btn">+</button>
                            <button id="Qte" disabled class="btn btn-default border-0">0</button>
                            <button onclick="minus()" class="btn-primary btn">-</button>
                        </div>
                    </div>
                    <button id="AddToCardBtn" class="btn btn-primary d-end mt-3"><i class="bi-cart bi-cart-plus-fill"></i> Add To Card</button>
                </div>
            </div>
            <hr class="my-4">
            <div class="row pt-3">
                <div class="col-12 col-lg-6">
                    <h1 class="display-6">Description</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos minima repellendus dolorum nemo rerum repellat suscipit dolor atque ducimus non perferendis enim dolorem obcaecati at consequuntur magni libero, consectetur laudantium. Distinctio
                        expedita quaerat laudantium facere?</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores, ea quibusdam deserunt sint, optio adipisci at repudiandae nesciunt eaque ipsa quaerat quos voluptatibus sequi obcaecati iste!</p>
                    <h1 class="display-6">Specifite</h1>
                    <ul>
                        <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi asperiores deserunt, explicabo aperiam incidunt officia dolore voluptates id perspiciatis vero?</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam eum expedita corporis!</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsum nihil dolorum possimus repudiandae, accusamus id consectetur ad quaerat laborum. Deserunt, odit.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate saepe dignissimos porro?</li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6 px-lg-5">
                    <h1 class="display-6">Comments</h1>
                    <div id="Comments">

                    </div>
                    <?php echo addCommentArea(); ?>

                </div>
            </div>
            <hr class="my-4">
            <div>
                <h1 class="display-6">Recommended For You</h1>
                <div class="row" id="Recommended"></div>
            </div>
        </div>
    </main>
    <div id="IsLoading" class="d-flex align-items-center justify-content-center height-100">
        <div class=" spinner-border"></div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="userName" id="username">
                        </div>
                        <div class="mb-3">
                            <input type="password" placeholder="Password" class="form-control" id="password">
                        </div>
                        <p id="SomthingWrong" class="text-danger ">Your username or password invalid</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <a href="./signIn.php" type="button" class="btn btn-outline-primary">Sign In</a>
                    <button type="button" onclick="login()" class="btn btn-primary">Log In</button>

                </div>
            </div>
        </div>
    </div>
    <footer class="py-3 card-footer bg-dark text-light">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>LEGO WebStore</h5>
                    <p class="text-white mb-2">Maison de la Recherche Blaise Pascal</p>
                    <p class="text-white mb-2">50 rue Ferdinand Buisson</p>
                    <p class="text-white mb-0">62228, Calais.</p>
                </div>
                <div>
                    <img width="50px" src="./Imgs/logo_lego.jpg" alt="">
                    <p class="text-white">WebStore</p>
                </div>
            </div>
        </div>

    </footer>
    <script>
        const userImg = '<?php if (isset($_SESSION["userInfo"])) {
                                echo $_SESSION["userInfo"]["img"];
                            } ?>'

        const Username = '<?php if (isset($_SESSION["userInfo"])) {
                                echo $_SESSION["userInfo"]["Username"];
                            } ?>'

        const loggedIn = '<?php echo isset($_SESSION["userInfo"]); ?>';
        const userId = '<?php if (isset($_SESSION["userInfo"])) {
                            echo $_SESSION["userInfo"]["User_Id"];
                        } ?>';
    </script>
    <script src="./js/login.js"></script>
    <script src="./js/product.js"></script>
</body>

</html>