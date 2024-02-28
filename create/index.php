<?php

// подключим файлы, необходимые для подключения к базе данных и файлы с объектами
include_once dirname(__DIR__) . "/config/db.php";
include_once dirname(__DIR__) . "/objects/product.php";
include_once dirname(__DIR__) . "/objects/category.php";
include_once dirname(__DIR__) . "/objects/info.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// создадим экземпляры классов Product и Category
$product = new Product($db);
$category = new Category($db);
$info = new ProductInfo($db);

$page_title = "Создание товара";

require_once dirname(__DIR__) . "/component/header.php";
?>
<link rel="stylesheet" href="/assets/style/create.css">
<main class="main">
    <div class="create">
        <div class="create-box box">
        <?php
            if ($_POST) {
                $runNum = rand(0, 9999999);
                $product->id = $runNum;
                $product->name = $_POST["name"];
                $product->description = $_POST["description"];
                $product->category_id = $_POST["category_id"];
                $image = !empty($_FILES["image"]["name"])
                    ? sha1_file($_FILES["image"]["tmp_name"]) . "-" . basename($_FILES["image"]["name"]) : "";
                $product->image = $image;
                $names = $_POST['info_product_name'];
                $descriptions = $_POST['info_product_description'];
                $description_arr = [];
                $name_arr = [];
                foreach ($names as $key => $val) {
                    $name_arr[] = $val;
                    $description_arr[] = $descriptions[$key];
                }
                if(count($names) > 0) {
                    $info->name = $name_arr;
                    $info->description = $description_arr;
                    $info->product_id = $runNum;
                    if($info->create()) {
                        echo "Успешно добавлены характеристики";
                    }
                }

                if ($product->create()) {
                    echo '<div class="alert alert-success">Товар был успешно создан.</div>';
                    echo $product->uploadPhoto();
                }

                else {
                    echo '<div class="alert alert-danger">Невозможно создать товар.</div>';
                }
            }
        ?>
            <h2 class="create-title">Создание товаров</h2>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <ul>
                    <li class="create-item">
                        <div class="create-item__title">Название</div>
                        <div class="create-item__input">
                            <input placeholder="Введите название товара" required type="text" name="name" class="form-control" />
                        </div>
                    </li>
                    <li class="create-item">
                        <div class="create-item__title">Описание</div>
                        <div class="create-item__input">
                            <textarea placeholder="Описание товара" type="text" name="description" class="form-control"></textarea>
                        </div>
                    </li>
                    <li class="create-item">
                        <div class="create-item__title">Изображение</div>
                        <div class="create-item__input">
                            <input type="file" name="image" />
                        </div>
                    </li>
                    <li class="create-item">
                        <div class="create-item__title">Категория</div>
                        <div class="create-item__input">
                            <?php
                                // читаем категории товаров из базы данных
                                $stmt = $category->read();

                                // помещаем их в выпадающий список
                                echo "<select class='form-control' name='category_id'>";
                                echo "<option>Выбрать категорию...</option>";

                                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_category);
                                    echo "<option value='{$id}'>{$name}</option>";
                                }

                                echo "</select>";
                            ?>
                        </div>
                    </li>
                </ul>
                <div class="char">
                    <div class="char-item">
                        <div class="char-item__title">Характеристики</div>
                        <ul class="char-list">
                        </ul>
                        <button type="button" class="char-add" add-char>Добавить характеристику</button>
                    </div>
                </div>
                <button type="submit" class="create-btn">Создать</button>
            </form>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.2.0/crypto-js.min.js" integrity="sha512-a+SUDuwNzXDvz4XrIcXHuCf089/iJAoN4lmrXJg18XnduKK6YlDHNRalv4yd1N40OKI80tFidF+rqTFKGPoWFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/script/al.js"></script>
<?php 
require_once dirname(__DIR__) . "/component/footer.php";
?>