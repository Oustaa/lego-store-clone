<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="./css/resets.css">

    <link rel="shortcut icon" href="./Imgs/logo_lego.jpg" type="image/x-icon">
    <title>LEGO Store | Sign in</title>
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
                        echo "<a href='' class='text-light nav-link'> " . $_SESSION['userInfo']['Username'] . " <i class='bi bi-person-circle'></i></a>";
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container p-3 p-md-5">

        <h2>Sign in</h2>

        <form name="inscreption" method="POST" action="./Php/Signin.php">

            <!-- nom et prénom -->
            <div class="row mt-3">
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <input onkeyup="" type="text" class="form-control" id="lastname" name="lname" placeholder="Lastname">
                    </div>
                </div>
                <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                    <div class="form-group">
                        <input onkeyup="" type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
                    </div>
                </div>
                <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                    <div class="form-group">
                        <input onkeyup="" type="text" class="form-control" id="userName" name="username" placeholder="Username">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <label for="year">BirthDay</label>
                </div>
                <div class="col-4">
                    <select name="year" onchange="setMonthvalue()" class="form-control" id="year">

                    </select>
                </div>
                <div class="col-4">
                    <select name="month" onchange="setVAlidDay()" class="form-control" id="month">
                        <option value="">--Month--</option>
                        <option value="0">Janvier</option>
                        <option value="1">Février</option>
                        <option value="2">Mars</option>
                        <option value="3">Avril</option>
                        <option value="4">Mai</option>
                        <option value="5">Juin</option>
                        <option value="6">Juillet</option>
                        <option value="7">Août</option>
                        <option value="8">Septembre</option>
                        <option value="9">Octobre</option>
                        <option value="10">Novembre</option>
                        <option value="11">Décembre</option>
                    </select>
                </div>
                <div class="col-4">
                    <select name="day" class="form-control" id="day">
                        <option value="">--Day--</option>
                    </select>
                </div>
            </div>
            <!-- email -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Adresse mail</label>
                        <input type="email" name="email" placeholder="Adresse mail" class="form-control" id="email">
                    </div>
                </div>


            </div>
            <!-- mot de passe -->
            <div class="row mt-3">
                <div class="col-12">
                    <label for="motDePass">Mor de passe <small id="passwordHelpInline" class="text-muted">(minimum 6 caractéres)</small>
                    </label>
                </div>
                <div class="col-6">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" id="motDePass">
                </div>
                <div class="col-6">
                    <input type="password" name="motDePassV" class="form-control" placeholder="Confirmez le mot de passe" id="motDePassv">
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck">
                    <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary mt-3" value="Sign In">
        </form>

    </div>

    <!-- Footer -->
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


    <!-- <script src="./js/validation.js"></script> -->
    <script src="./js/ValidateForm.js"></script>
</body>

</html>