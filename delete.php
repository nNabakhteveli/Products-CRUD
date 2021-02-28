<?php

echo '<pre>';
var_dump($_GET);
echo '<pre>';


$pdo = new PDO('mysql:host=localhost;port=3308;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET["id"] ?? null;

if(!$id) {
    header("Location: index.php");
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id=:id');
$statement->bindValue(':id', $id);
$statement->execute();

header("Location: index.php");
exit;

?>