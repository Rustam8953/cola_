<?php 
// здесь будет получение товаров из БД
// включаем соединение с БД и файлы с объектами
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once dirname(__DIR__) . "/config/db.php";
include_once dirname(__DIR__) . "/objects/product.php";
include_once dirname(__DIR__) . "/objects/category.php";

// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);

// запрос товаров
$stmt = $product->readAll();
$categotyList = $category->read();
$num = $stmt->rowCount();;

//логика фильтра по категории товаров
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$parts = array_slice($parts, 0, -1);
$path_name_front = end($parts);
$id_cat = null;
$descri_cat_text = '';

$catTitle = "Каталог";

$page_title="Каталог";
require_once dirname(__DIR__) .'../component/header.php';

$host = $_SERVER['HTTP_HOST'];
if($url == '/catalog/') {
    ?>
    <script>
        console.log(window.location.host)
        window.location.href = `http://${window.location.host}catalog/gaz`;
    </script>
    <?php
}
?>
<link rel="stylesheet" href="/assets/style/page.css">
<main class="main">
    <div class="page">
        <div class="page-box box">
            <h1 class="page-title"><?php echo $catTitle ?></h1>
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
                                    $descri_cat_text = $description;
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="page-content">
                    <div class="page-content__box">
                        <?php
                            if ($num > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    if($id_cat == $category_id) {
                                        echo "<div class='page-item'>";
                                            echo '<div class="page-item__img">';
                                            echo "<img src='/assets/img/product/dc73063978e68480333f7fd85f3c445d.png' alt=''>";
                                            echo "</div>";
                                            echo "<a href='/product?id={$id}' class='page-item__name'>{$name}</a>";
                                        echo "</div>";
                                    }
                                }
                            }
                            else {
                                echo "<div class='alert alert-info'>Товары не найдены.</div>";
                            }
                        ?>
                    </div>
                    <div class="page-catalog__text">
                        <?php  
                            if($num > 0) {
                                echo $descri_cat_text;
                            } else {
                                false;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include dirname(__DIR__) . '/component/btnTop.php'; ?>
</main>
<script src="/assets/script/catalog.js"></script>
<?php include dirname(__DIR__) . '../component/footer.php' ?>