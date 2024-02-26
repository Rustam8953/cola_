<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// получаем ID товара
$id = isset($_GET["id"]) ? $_GET["id"] : die("ERROR: отсутствует ID.");

// подключаем файлы для работы с базой данных и файлы с объектами
include_once dirname(__DIR__) . "/config/db.php";
include_once dirname(__DIR__) . "/objects/product.php";
include_once dirname(__DIR__) . "/objects/category.php";

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
    <div class="page p">
        <div class="page-box box">
            <div class="page-nav">
                <a href="/" class="page-nav__item">Главная</a>
                <a href="/catalog" class="page-nav__item">Каталог</a>
                <?php
                    echo "<a href='/product/?id={$product->id}' class='page-nav__item'>$product->name</a>";
                ?>
            </div>
            <div class="page-title"><?php echo $product->name ?></div>
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
                <div class="product-r">
                    <div class="product-l__box">
                        <img src="/static/<?php echo $product->image?>.png" alt="" loading="lazy">
                    </div>
                    <div class="product-item">
                        <h2>Характеристика</h2>
                        <ul class="product-list">
                            <li>
                                <span>Название</span>
                                <span><?php echo $product->name; ?></span>
                            </li>
                            <?php
                                $infos = $product->productInfoSearch($product->id);
                                while ($row = $infos->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    echo "<li id=$id>";
                                        echo "<span>{$name}</span>";
                                        echo "<span>{$description}</span>";
                                    echo "</li>";
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="product-item">
                        <h2>Свойства</h2>
                        <?php
                            $cat = $category->readOne($product->category_id);
                            while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                echo "<p>";
                                echo "{$description}";
                                echo "</p>";
                            }
                        ?>
                    </div>
                    <button>вернуться к списку</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    include_once dirname(__DIR__) . '/component/btnTop.php';
    include_once dirname(__DIR__) . '/component/footer.php';
?>