<?php

// получаем ID товара
$id = isset($_GET["id"]) ? $_GET["id"] : die("ERROR: отсутствует ID.");

// подключаем файлы для работы с базой данных и файлы с объектами
include_once dirname(__DIR__) . "/config/db.php";
include_once dirname(__DIR__) . "/objects/product.php";
include_once dirname(__DIR__) . "/objects/category.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();
 
// подготавливаем объекты
$product = new Product($db);
$category = new Category($db);
$categotyList = $category->read();

//логика фильтра по категории товаров
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$parts = array_slice($parts, 0, -1);
$path_name_front = end($parts);
$id_cat = null;

// устанавливаем свойство ID товара для чтения
$product->id = $id;

// получаем информацию о товаре
$product->readOne();

$page_title = "Страница товара (чтение одного товара)";

include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/page.css">
<main class="main">
    <div class="page">
        <div class="page-box box">
            <div class="page-wrap">
                <div class="page-menu"> 
                    <ul class="page-list">
                        <?php
                            while ($new_row_category = $categotyList->fetch(PDO::FETCH_ASSOC)) {
                                extract($new_row_category);
                                echo "<li class='page-list__name'>";
                                echo "<a href='/catalog/{$path_name}' class='product-cat' path id='{$id}'>{$name}</a>";
                                echo "</li>";
                                if($path_name == $path_name_front) {
                                    $id_cat = $id;
                                }
                            }
                        ?>
                    </ul>
                </div>
                <table class="table table-hover table-responsive table-bordered">
                    <tr>
                        <td>Название</td>
                        <td><?php echo $product->name; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
    include_once dirname(__DIR__) . '/component/btnTop.php';
    include_once dirname(__DIR__) . '/component/footer.php';
?>