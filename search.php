<?php

header('Content-Type: application/json');

include_once "./config/db.php";
include_once "./objects/product.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$arr = [];

$data = json_decode(file_get_contents('php://input'), true);
$input_name = $data["dataName"];

if ($input_name) {
    $stmt = $product->search($input_name);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
} else {
    echo json_encode("Поле input не было отправлено или было отправлено без значения");
}

?>