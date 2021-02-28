<?php 

$pdo = new PDO('mysql:host=localhost;port=3308;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";
// exit;


echo "<pre>";
var_dump($_POST);
echo "</pre>";


if($_SERVER['REQUEST_METHOD'] === "POST")
{
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];


  $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
  VALUES (:title, :image, :description, :price, :date)");

  $statement ->bindValue(':title', $title);
  $statement ->bindValue(':image', '');
  $statement ->bindValue(':description', $description);
  $statement ->bindValue(':price', $price);
  $statement ->bindValue(':date', date('Y-m-d H:i:s'));

  $statement->execute();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Products CRUD</title>
  </head>
  <body>

  <h1>Create new Product</h1>
    <form method="POST">
    <div class="mb-3">
        <label>Title</label>
        <input name='title' type="name" class="form-control">
        <div class="form-text">Enter your product name</div>
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <div class="form-text"></div>
        <input name='price' type="number" class="form-control">
    </div>
    <div class="mb-3">
        <label>Description</label>
        <div class="form-text"></div>
        <textarea name='description' type="text" cols="60" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label>Image</label><br>
        <input type="file" name='image'>
        <div id="emailHelp" name='image' class="form-text"></div>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>