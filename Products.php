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
    <main class="container py-5 d-none">
        <header>
            <h2 class="display-4 text-center">Our Products</h2>
            <hr class="bg-warning py-1 rounded-1" style="width:300px ; margin-inline: auto;">
            <div style="width: 300px; margin-inline:auto " class="form">
                <p class="text-center text-muted">Filter by products Categories</p>
                <select class="form-control" name="Categories" id="Categories">
                    <option value="">All</option>
                </select>
            </div>
        </header>
        <div id="cardContainer" class="row"></div>
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
        const loggedIn = '<?php echo isset($_SESSION["userInfo"]); ?>';
    </script>
    <script src="./js/login.js"></script>
    <script type="module" src="./js/Products.js"></script>
</body>

</html>