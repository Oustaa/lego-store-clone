<?php
session_start();

$PDO = new PDO("mysql:host=localhost;dbname=lego_store", "root", "");

$username = $_POST['username'];
$password = $_POST['password'];



$stmt = $PDO->prepare("SELECT * FROM users WHERE Username = '$username'");

$stmt->execute();

$ExistStmt = $PDO->prepare("SELECT COUNT(Username) FROM users WHERE Username = '$username'");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (count($result) > 0) {
 if ($result[0]["PassWord"] == $password) {
  $_SESSION['userInfo'] = $result[0];
  print_r($result[0]);
  echo true;
 } else {
  echo false;
 }
} else {
 echo 'No username';
}
