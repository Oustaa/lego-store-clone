<?php
session_start();

if (!isset($_SESSION['userInfo'])) header('Location:index.php');

function Acountnav()
{
    $username = $_SESSION['userInfo']['Username'];
    $userImg = $_SESSION['userInfo']['img'];
    return "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle text-light' href='#' id='dropDown' role='button' data-bs-toggle='dropdown' aria-expanded='false'> $username <img src='$userImg' style='border-radius: 500px;' width='25px' alt=''></a>
                    <ul class='dropdown-menu bg-dark' aria-labelledby='dropDown'>
                        <li><a class='dropdown-item text-light' href='./Php/SignOut.php'>Sign out</a></li>
                    </ul>
                </li>";
}

function displayInfo()
{
    $fname = $_SESSION['userInfo']['fistname'];
    $lname = $_SESSION['userInfo']['lastname'];
    $email = $_SESSION['userInfo']['Email'];
    $Bd = $_SESSION['userInfo']['BirthDay'];
    $username = $_SESSION['userInfo']['Username'];
    $img = $_SESSION['userInfo']['img'];

    return "<div class='row py-5'>
            <div id='info-top' class='col-4 text-center'>
                <div class='d-flex align-items-center justify-content-center flex-column'>
                    <div onclick='showImgs()' id='imgContainer'>
                        <img src='$img' id='ProfilImg' class='img-fluid rounded' alt=''>
                        <div id='cahngeImg'><h5>Change Img</h5></div>
                    </div>
                    <div id='imgs'>
                        <div class='row'>
                        </div>
                    </div>
                </div>
                <h5 class='text-ceter dsplay-6 my-4'>$username</h5>
                <button class='btn btn-block btn-primary'>Edit Profile</button>
                <button onclick='DeleteAcount()' class='btn btn-danger'>Delete Acount</button>
            </div>
            <div class='col-8'>
                <h4 class='text-cer display-6'>Acount Information:</h4>
                <div class='row mt-3'>
                    <div class='col-3'>
                        <h5 class=' text-muted'>Firstname:</h5>
                    </div>
                    <div class='col-9'>
                        <h5>$fname</h5>
                        <input type='text' value='$fname' class='hidden form-control' hidden>
                    </div>
                </div>
                <div class='row mt-3'>
                    <div class='col-3'>
                        <h5 class=' text-muted'>Lastname:</h5>
                    </div>
                    <div class='col-9'>
                        <h5>$lname</h5>
                        <input type='text' value='$lname' class='hidden form-control' hidden>
                    </div>
                </div>
                <div class='row mt-3'>
                    <div class='col-3'>
                        <h5 class=' text-muted'>Email:</h5>
                    </div>
                    <div class='col-9'>
                        <h5>$email</h5>
                        <input type='text' value='$email' class='hidden form-control' hidden>
                    </div>
                </div>
                <div class='row mt-3'>
                    <div class='col-3'>
                        <h5 class=' text-muted'>Birthday:</h5>
                    </div>
                    <div class='col-9'>
                        <h5>$Bd</h5>
                        <input type='date' value='' class='hidden form-control' hidden>
                    </div>
                </div>
                <button class='btn btn-success mt-3 d-none'>Save Changes</button>
                <h4 class='text-cer display-6 mt-5'>Your Comments:</h4>
                <div id='CommentsContainer'>

                </div>
                <div id='imgs'>
                </div>
            </div>
        </div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Icons Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/resets.css">

    <link rel="shortcut icon" href="./Imgs/logo_lego.jpg" type="image/x-icon">
    <script>
        $("main").toggleClass("d-none");
    </script>
    <title>LEGO Store |
        <?php echo $_SESSION['userInfo']['Username']; ?>
    </title>

    <style>
        #info-top {
            position: sticky;
            top: 0;
            height: fit-content;
        }

        #imgContainer {
            position: relative;
        }

        #imgContainer:hover #cahngeImg {
            cursor: pointer;
            display: flex;
        }

        #cahngeImg {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            border-radius: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
        }

        #cahngeImg h5 {
            color: #fff;
        }
    </style>
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
                    echo Acountnav();
                    ?>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <?php
        echo displayInfo();
        ?>

    </main>

    <footer class="mt-5 py-3 card-footer bg-dark text-light">
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

    <script src="./js/profile.js"></script>

</body>

</html>