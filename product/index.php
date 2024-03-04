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
$categoty_double = $category->read();

//логика фильтра по категории товаров
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$parts = array_slice($parts, 0, -1);
$path_name_front = end($parts);
$id_cat = null;
$cat_path;

$product->id = $id;

// получаем информацию о товаре
$product->readOne();

$categoryOne = $category->readOne($product->category_id);

$page_title = $product->name;
// while ($new_arr = $categotyList->fetch(PDO::FETCH_ASSOC)) {
//     extract($new_arr);
//     if($product->id == $id) {
//         
//         $cat_path = $path_name;
//     }
// }
$cat_new = $category->readOne($product->category_id);
while ($row = $cat_new->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $cat_path = $path_name;
}
include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/page.css?<?php echo date('d:m:y:H:i:s'); ?>">
<main class="main">
    <div class="page p">
        <div class="page-box box">
            <div class="page-nav">
                <a href="/" class="page-nav__item">Главная</a>
                <a href="/catalog/<?php echo $cat_path; ?>" class="page-nav__item">Каталог</a>
                <?php
                    echo "<a href='/product/?id={$product->id}' class='page-nav__item'>$product->name</a>";
                ?>
            </div>
            <div class="page-title"><?php echo $product->name ?></div>
            <div class="page-wrap">
                <div class="page-menu">
                    <ul class="page-list">
                        <?php
                            while ($new_row_category = $categoty_double->fetch(PDO::FETCH_ASSOC)) {
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
                    <div class="product-head">
                        <div class="product-l__box">
                            <?php
                                if($product->image !== '')  {
                                    echo "<img src='/static/$product->image' alt='' loading='lazy'>";
                                } else {
                                    echo "<img src='/assets/img/logo/none.png' alt='' loading='lazy'>";
                                }
                            ?>
                        </div>
                        <div class="product-info">
                            <div class="product-title"><?php echo $product->name ?></div>
                            <div class="product-info__btm">
                                <div class="product-info__btn">
                                    <button modal-product class="product-modal__add">Оставить заявку</button>
                                </div>
                                <div class="product-info__link">
                                    
                                </div>
                            </div>
                        </div>
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
                                if($description !== '') {
                                    echo "<p>";
                                        echo "{$description}";
                                    echo "</p>";
                                }
                            }
                        ?>
                    </div>
                    <button class="back" onclick="window.location.href = '/catalog/<?php echo $cat_path; ?>'">вернуться к списку</button>
                </div>
            </div>
        </div>
        <?php //include_once dirname(__DIR__) . '/form.php' ?>
    </div>
</main>
<div class="product-modal">
    <form class="product-modal__box" onsubmit="return false" name="product-form" id="product-form">
        <div class="modal-head">
            <p>Оставьте заявку на консультацию</p>
            <div class="modal-close" modal-product-close></div>
        </div>
        <div class="modal-body"> 
            <div class="form-item">
                <input required placeholder=" " name="product-name" id="product-name">
                <span>Имя*</span>
            </div>
            <div class="form-item">
                <input required placeholder=" " name="product-tel" id="product-tel">
                <span>Телефон*</span>
            </div>
            <div class="form-item">
                <input placeholder=" " name="product-mail" id="product-mail">
                <span>Почта</span>
            </div>
            <div class="form-item">
                <input name="product-item" readonly value="<?php echo $product->name?>" id="product-item">
                <span>Продукт</span>
            </div>
        </div>
        <div class="modal-foot">
            <button type="submit">Отправить</button>
        </div>
    </form>
</div>

<?php
    include_once dirname(__DIR__) . '/component/btnTop.php';
    include_once dirname(__DIR__) . '/component/footer.php';
?>