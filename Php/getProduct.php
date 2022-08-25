<?php

session_start();

$PDO = new PDO("mysql:host=localhost;dbname=lego_store", "root", "");


$requist_type = $_POST['Type'];

function getCategoriesAndProduct($pdo)
{

  $data = ['categoies' => [], 'data' => []];

  $SelectCategory = "SELECT DISTINCT Category From product";

  $Result = $pdo->query($SelectCategory);

  $data['categoies'] =  $Result->fetchAll(PDO::FETCH_ASSOC);


  $selectProducts = $pdo->query("SELECT p.*,i.Url,d.text
    FROM imgs i
    INNER JOIN product p
    ON i.Product_id = p.Product_Id
    INNER JOIN description d
    ON d.Product_id = p.Product_Id
    GROUP BY product_id;");


  $Produit = $selectProducts->fetchAll(PDO::FETCH_ASSOC);

  $data['data'] = $Produit;


  return $data;
}

function GetFiltredProducts($pdo, $filter)
{
  $stmt = $pdo->query("SELECT p.*,i.Url,d.text
  FROM imgs i
  INNER JOIN product p
  ON i.Product_id = p.Product_Id
  INNER JOIN description d
  ON d.Product_id = p.Product_Id
  WHERE p.Category = '$filter'
  GROUP BY Product_id
  ;");

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $data;
}

function GetComments($pdo)
{
  if (isset($_POST["productId"])) {
    $id = $_POST["productId"];

    $stmt = $pdo->prepare("SELECT  comments.Comment_Id ,comments.Date, comments.Content,users.img,users.Username,users.User_Id
    FROM comments
    RIGHT JOIN users
    ON comments.User_Id = users.User_Id
    WHERE comments.Product_Id = '$id';");
  } else {
    $id = $_SESSION["userInfo"]['User_Id'];

    $stmt = $pdo->prepare("SELECT  comments.Comment_Id ,comments.Date, comments.Content,product.Title,imgs.Url  
      FROM comments
      RIGHT JOIN product
      ON comments.Product_Id = product.Product_Id
      RIGHT JOIN imgs
      ON comments.Product_Id = imgs.Product_Id
      WHERE comments.User_Id = '$id'
      GROUP BY comments.Comment_Id;");
  }

  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProduct($pdo, $id)
{
  $data = [];

  $stmt_Imgs = $pdo->query("SELECT Url From imgs WHERE Product_id = '$id'");
  $data['imgs'] = $stmt_Imgs->fetchAll(PDO::FETCH_ASSOC);

  $stmt_Info = $pdo->query("SELECT * From product WHERE Product_id = '$id'");

  $data['info'] = $stmt_Info->fetch(PDO::FETCH_ASSOC);

  $data['CatTest'] = GetFiltredProducts($pdo, $data['info']['Category']);


  $data['Comments'] = GetComments($pdo);

  return $data;
}

function getCartProduct($pdo, $id)
{

  $stmt = $pdo->prepare("SELECT p.* ,i.Url,c.QTE as qte
          FROM product p
          RIGHT join imgs i
          on p.Product_Id = i.Product_Id
          RIGHT join cart c
          on p.Product_Id = c.Product_Id
          WHERE c.userId = '$id'
          GROUP BY p.Product_Id;");

  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function deleteProduct($pdo)
{
  $product_id = $_POST['id'];
  $user_id = $_POST['user_id'];

  $stmt = $pdo->prepare("DELETE FROM cart WHERE Product_Id = '$product_id' AND userId ='$user_id' ");

  $stmt->execute();

  return getCartProduct($pdo, $user_id);
}

function AddItemTOCart($pdo)
{
  $userId = $_SESSION['userInfo']['User_Id'];
  $PID = $_POST['id'];
  $QTE = $_POST['qte'];

  $ExistStmt = $pdo->prepare("SELECT COUNT(*) FROM cart WHERE userId = '$userId' AND Product_Id = '$PID'");

  $ExistStmt->execute();

  $result = $ExistStmt->fetchAll(PDO::FETCH_ASSOC);

  $Count = intval($result[0]["COUNT(*)"]);
  if ($Count == 0) {
    $stmt =  $pdo->prepare("INSERT INTO cart (Product_Id, QTE, userId) VALUES (:pId, :qte, :userId)");

    $stmt->bindParam(':pId', $PID);
    $stmt->bindParam(':qte', $QTE);
    $stmt->bindParam(':userId', $userId);

    $stmt->execute();
  } else {

    $stmt =  $pdo->prepare("UPDATE cart SET 
      QTE = QTE + $QTE;
      WHERE userId = '$userId' AND Product_Id = '$PID'
    ");

    $stmt->bindParam(':pId', $PID);
    $stmt->bindParam(':qte', $QTE);
    $stmt->bindParam(':userId', $userId);

    $stmt->execute();
  }

  return $Count;
}

function DeleteAcount($pdo)
{
  $id = $_SESSION["userInfo"]["User_Id"];

  $stmt = $pdo->prepare("DELETE FROM users WHERE User_Id = '$id'");

  $stmt->execute();
  header('Location:SignOut.php');
}

function AddComment($pdo)
{
  $userId = $_SESSION['userInfo']['User_Id'];
  $productId = $_POST['productId'];
  $text = $_POST['Content'];

  $stmt = $pdo->prepare("INSERT INTO comments (  Content, Product_Id, User_Id) VALUES (:text,:pID,:UId)");

  $stmt->bindParam(':text', $text);
  $stmt->bindParam(':pID', $productId);
  $stmt->bindParam(':UId', $userId);

  $stmt->execute();

  $lastId = $pdo->prepare("SELECT * FROM comments ORDER BY Comment_Id DESC LIMIT 1");

  $lastId->execute();


  return $lastId->fetch(PDO::FETCH_ASSOC);
}

function DeleteComment($pdo)
{
  $id = $_POST["commentId"];

  $stmt = $pdo->prepare("DELETE FROM comments WHERE Comment_Id = '$id'");

  $stmt->execute();
}
function ChangeUserInfo($pdo)
{
  $newImg = $_POST["url"];
  $userId = $_SESSION['userInfo']['User_Id'];

  $stmt = $pdo->prepare("UPDATE users SET img = '$newImg' 
    WHERE User_Id = '$userId'
  ");

  $_SESSION['userInfo']['img'] = $newImg;

  $stmt->execute();
}





if ($requist_type == 'Get Catigories/Products') {
  echo json_encode(getCategoriesAndProduct($PDO));
} else if ($requist_type == 'Get Filter Product') {
  $filter = $_POST['filter'];
  if ($filter == "") {
    echo json_encode(getCategoriesAndProduct($PDO)['data']);
  } else {
    echo json_encode(GetFiltredProducts($PDO, $filter));
  }
} else if ($requist_type == 'Get Product Info') {
  $data = getProduct($PDO, $_POST['productId']);

  echo json_encode($data);
} else if ($requist_type == 'Get Cart Product Info') {
  // echo getCartProduct($_POST["productsId"]);
  echo json_encode(getCartProduct($PDO, $_SESSION['userInfo']['User_Id']));
} else if ($requist_type == "Delete Product") {
  echo json_encode(deleteProduct($PDO));
} else if ($requist_type == "Add Product") {
  echo json_encode(AddItemTOCart($PDO));
} else if ($requist_type == "Delete Acount") {
  DeleteAcount($PDO);
} else if ($requist_type == "Add Comment") {
  echo json_encode(AddComment($PDO));
} else if ($requist_type == "Delete Comment") {
  DeleteComment($PDO);
} else if ($requist_type == "Get Comments") {
  echo json_encode(GetComments($PDO));
} else if ($requist_type == "ChangeUserImg") {
  echo ChangeUserInfo($PDO);
}

// SELECT product.Product_Id, product.Title,imgs.Url 
// FROM imgs  
// INNER JOIN product  
// ON imgs.Product_id = product.Product_Id  
// ORDER BY Product_Id;