<?php

// получаем ID товара
$id = isset($_GET["id"]) ? $_GET["id"] : die("ERROR: отсутствует ID.");

// подключаем файлы для работы с базой данных и файлы с объектами
include_once "config/db.php";
include_once "objects/product.php";
include_once "objects/category.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();
 
// подготавливаем объекты
$product = new Product($db);
$category = new Category($db);

// устанавливаем свойство ID товара для чтения
$product->id = $id;

// получаем информацию о товаре
$product->readOne();

$page_title = "Страница товара (чтение одного товара)";

require_once "./component/header.php";
?>

<!-- HTML-таблица для отображения информации о товаре -->
<table class="table table-hover table-responsive table-bordered">
    <tr>
        <td>Название</td>
        <td><?= $product->name; ?></td>
    </tr>
    <tr>
        <td>Цена</td>
        <td><?= $product->price; ?></td>
    </tr>
    <tr>
        <td>Описание</td>
        <td><?= $product->description; ?></td>
    </tr>
    <tr>
        <td>Категория</td>
        <td>
            <?php // выводим название категории
            $category->id = $product->category_id;
            $category->readName();

            echo $category->name;
            ?>
        </td>
    </tr>
</table>

<?php // подвал
require_once "./component/footer.php";