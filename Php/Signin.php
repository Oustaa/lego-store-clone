<?php
session_start();

$PDO = new PDO('mysql:host=localhost;dbname=lego_store', "root", "");


$testExistent = $PDO->prepare("SELECT Username FROM users");
$testExistent->execute();
$userNames = $testExistent->fetchAll(PDO::FETCH_COLUMN);

if (in_array($_POST['username'], $userNames)) {
 echo "Found";
} else {
 echo "Not Found";
 $stmt = $PDO->prepare("INSERT INTO users (Email, PassWord, Username, fistname, lastname) VALUES (:email,:pass,:username,:fname,:lname)");



 $stmt->bindParam(":email", $_POST['email']);
 $stmt->bindParam(":pass", $_POST['password']);
 $stmt->bindParam(":username", $_POST['username']);
 $stmt->bindParam(":fname", $_POST['fname']);
 $stmt->bindParam(":lname", $_POST['lname']);
 // $stmt->bindParam(":birthDay", $_POST['birthDay']);

 $stmt->execute();

 $userName = $_POST['username'];

 $stmt = $PDO->prepare("SELECT * FROM users WHERE Username = '$userName'");

 $stmt->execute();

 $result = $stmt->fetch(PDO::FETCH_ASSOC);

 $_SESSION['userInfo'] = $result;

 header("Location:../index.php");
}
