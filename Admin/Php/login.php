<?php
session_start();
if (isset($_SESSION['LogedIn'])) {
 header('Location:acount.html');
}
$username = $_POST['username'];
$password = $_POST['password'];

try {
 $PDO = new PDO("mysql:host=localhost;
 dbname=lego_store", $username, $password);
 $_SESSION['LogedIn'] = true;
 echo true;
} catch (Exception $e) {
 echo false;
}
