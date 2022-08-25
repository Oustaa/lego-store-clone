<?php
session_start();
if (isset($_SESSION['LogedIn'])) {
    header('Location:acount.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/resets.css">

    <link rel="shortcut icon" href="../Imgs/logo_lego.jpg" type="image/x-icon">
    <title>LEGO Store | Admin</title>
</head>

<body class="flex">
    <div class="container_small">
        <form method="Post" action="./Php/login.php" class="form-container">
            <input type="text" name="username" class="form-control">
            <input type="password" name="password" class="form-control my-2">
            <button type="submit" class="btn btn-primary">Log in</button>
        </form>
    </div>
    <!-- <script src="./login.js"></script> -->
</body>

</html>