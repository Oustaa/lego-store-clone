<?php

$PDO = new PDO("mysql:host=localhost;dbname=lego_store", "root", "");

$stmt = $PDO->prepare("SELECT product.Product_Id,product.Title,product.Category,product.Price,imgs.Url
FROM product 
RIGHT JOIN imgs
on product.Product_Id = imgs.Product_Id
WHERE product.Product_Id  in (1,5,6,8)
GROUP BY Product_Id;");

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
