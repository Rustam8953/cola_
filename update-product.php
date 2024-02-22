<?php

// получаем ID редактируемого товара
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

// устанавливаем свойство ID товара для редактирования
$product->id = $id;

// получаем информацию о редактируемом товаре
$product->readOne();

// установка заголовка страницы
$page_title = "Обновление товара";

include_once "./component/header.php";
?>
<main class="main">
    <div class="box">
        <?php
            // если форма была отправлена (submit)
            if ($_POST) {

                // устанавливаем значения свойствам товара
                $product->name = $_POST["name"];
                $product->logo = $_POST["logo"];
                $product->description = $_POST["description"];
                $product->category_id = $_POST["category_id"];

                // обновление товара
                if ($product->update()) {
                    echo "<div class='alert alert-success alert-dismissable'>";
                    echo "Товар был обновлён.";
                    echo "</div>";
                }

                // если не удается обновить товар, сообщим об этом пользователю
                else {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "Невозможно обновить товар.";
                    echo "</div>";
                }
            }
        ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
            <table class="table table-hover table-responsive table-bordered">

                <tr>
                    <td>Название</td>
                    <td><input type="text" name="name" value="<?= $product->name; ?>" class="form-control" /></td>
                </tr>

                <tr>
                    <td>Цена</td>
                    <td><input type="text" name="logo" value="<?= $product->price; ?>" class="form-control" /></td>
                </tr>

                <tr>
                    <td>Описание</td>
                    <td><textarea name="description" class="form-control"><?= $product->description; ?></textarea></td>
                </tr>

                <tr>
                    <td>Категория</td>
                    <td>
                        <?php
                            $stmt = $category->read();

                            // помещаем категории в выпадающий список
                            echo "<select class='form-control' name='category_id'>";
                                echo "<option selected disabled value=''>Выберите категорию</option>";
                                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $category_id = $row_category["id"];
                                    $category_name = $row_category["name"];

                                    // необходимо выбрать текущую категорию товара
                                    if ($product->category_id == $category_id) {
                                        echo "<option value='$category_id' selected>";
                                    } else {
                                        echo "<option value='$category_id'>";
                                    }
                                    echo "$category_name</option>";
                                }
                            echo "</select>";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </td>
                </tr>

            </table>
        </form>
    </div>
</main>

<?php // подвал
require_once "./component/footer.php";
?>