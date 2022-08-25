<?php

$PDO = new PDO("mysql:host=localhost;dbname=lego_store", "root", "");


$Products = json_decode(file_get_contents('../Product.json'));

// foreach ($Products as $product) {
//  $SQL = "INSERT INTO product VALUES(:id,:title,:Cate,:QTE,:Descrip,:Price)";

//  $stmt_insert = $PDO->prepare($SQL);

//  $stmt_insert->bindParam(':id', $product->id);
//  $stmt_insert->bindParam(':title', $product->title);
//  $stmt_insert->bindParam(':Cate', $product->Category);
//  $stmt_insert->bindParam(':QTE', $product->quantiteOnStock);
//  $stmt_insert->bindParam(':Descrip', $product->description[0]);
//  $stmt_insert->bindParam(':Price', $product->price);

//  // echo $product->id . "<br>";

//  $stmt_insert->execute();
// }


// foreach ($Products as $product) {
//  $SQL = "INSERT INTO imgs VALUES('',:imgUrl,:product_ID)";

//  $stmt_insert = $PDO->prepare($SQL);

//  foreach ($product->imgs as $value) {
//   $stmt_insert->bindParam(':imgUrl', $value);
//   $stmt_insert->bindParam(':product_ID', $product->id);

//   $stmt_insert->execute();
//  }
// }

// foreach ($Products as $product) {
//  $SQL = "INSERT INTO description VALUES('',:text,:product_ID)";

//  $stmt_insert = $PDO->prepare($SQL);

//  foreach ($product->description as $value) {
//   $stmt_insert->bindParam(':text', $value);
//   $stmt_insert->bindParam(':product_ID', $product->id);

//   $stmt_insert->execute();
//  }
// }

{
 $id = $_POST['id'];

 $SQL = "SELECT URl From imgs where Product_id = '$id'";

 $stmt = $PDO->query($SQL);

 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($data);
}
