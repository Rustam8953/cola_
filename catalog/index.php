<<<<<<< HEAD
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

$categotyList = $category->read();
$num = null;

//логика фильтра по категории товаров
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$parts = array_slice($parts, 0, -1);
$path_name_front = end($parts);
$id_cat = null;
$descri_cat_text = '';

$catTitle = "Каталог";

$page_title="Каталог";
require_once dirname(__DIR__) .'/component/header.php';

$host = $_SERVER['HTTP_HOST'];
if($url == '/catalog/') {
    ?>
    <script>
        window.location.href = `http://${window.location.host}catalog/gaz`;
    </script>
    <?php
}
?>
<link rel="stylesheet" href="/assets/style/page.css?<?php echo date('d:m:y:H:i:s'); ?>">
<main class="main">
    <div class="page">
        <div class="page-box box">
            <div class="page-nav">
                <a href="/">Главная</a>
                <a href="/catalog">Каталог</a>
            </div>
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
                    <?php
                        $stmt = $product->catProduct($id_cat);
                        $num = $stmt->rowCount();
                        if ($num > 0) {
                            echo "<div class='page-content__box'>";
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                echo "<div class='page-item'>";
                                    echo '<div class="page-item__img">';
                                        if($image !== "") {
                                            echo "<img src='/static/{$image}' alt='' loading=lazy>";
                                        } else {
                                            echo "<img src='/assets/img/logo/none2.png' style='max-width: 200px;' alt='' loading=lazy>";
                                        }
                                    echo "</div>";
                                    echo "<a href='/product?id={$id}' class='page-item__name'>{$name}</a>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else {
                            echo "<div class='product-none'>Товары не найдены.</div>";
                        }
                    ?>
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
<script src="/assets/script/catalog.js?<?php echo date('d:m:y:H:i:s'); ?>"></script>
<?php include dirname(__DIR__) . '/component/footer.php' ?>
=======
<div class="page">
    <div class="page-box box">
        <h1 class="page-title">Каталог</h1>
        <div class="page-wrap">
            <ul class="page-list">
                <li class="page-list__name">
                    <a href="">
                        Газированные напитки
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="page-list__name">
                    <a href="">
                        Газированные напитки
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="page-list__name">
                    <a href="">
                        Газированные напитки
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="page-list__name">
                    <a href="">
                        Газированные напитки
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="page-list__name">
                    <a href="">
                        Газированные напитки
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="page-list__name">
                    <a href="">
                        Газированные напитки
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <div class="page-content">

            </div>
        </div>
    </div>
</div>
>>>>>>> dd3f67d44152042ebd2d4283ebe672e0da386406
