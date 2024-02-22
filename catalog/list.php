<ul class="page-list">
    <?php
        // подключим файлы, необходимые для подключения к базе данных и файлы с объектами
        include_once "../config/db.php";
        include_once "../objects/category.php";

        // получаем соединение с базой данных
        $database = new Database();
        $db = $database->getConnection();

        // создадим экземпляры классов Category
        $category = new Category($db);
        // читаем категории товаров из базы данных
        $stmt = $category->read();

        while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row_category);
            echo "<li class='page-list__name' id='{$id}'>";
            echo "<a href=''>{$name}<i class='fa fa-chevron-right' aria-hidden='true'></i></a>";
            echo "</li>";
        }
    ?>
</ul>