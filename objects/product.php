<?php

class Product {
    private $conn;
    private $table_name = "products";
    private $table_info = "product_info";

    public $id;
    public $name;
    public $logo;
    public $image;
    public $description;
    public $category_id;
    public $timestamp;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // метод создания товара
    function create() {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    id=:id, name=:name, description=:description, image=:image, category_id=:category_id, created=:created";

        $stmt = $this->conn->prepare($query);

        // опубликованные значения
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // получаем время создания записи
        $this->timestamp = date("Y-m-d H:i:s");

        // привязываем значения
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // метод для получения всех товаров
    function readAll() {
        $query = "SELECT
                    id, name, description, logo, image, category_id
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    //метод для вывода товаров по определенной категории
    function catProduct($id_cat) {
        $query = "SELECT * FROM 
            " . $this->table_name . "
            WHERE 
            category_id = $id_cat";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    // используется для пагинации товаров
    public function countAll() {
        $query = "SELECT id FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }
    //Метод для поиска значений из таблицы инфо исходя из id обьекта
    function productInfoSearch($id_info) {
        $query = "SELECT * FROM 
            " . $this->table_info . "
            WHERE 
            product_id = $id_info";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    // метод для получения одного товара
    function readOne() {
        $query = "SELECT
                    name, description, logo, image, category_id
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row["name"];
        $this->logo = $row["logo"];
        $this->description = $row["description"];
        $this->image = $row["image"];
        $this->category_id = $row["category_id"];
    }
    // метод для обновления товара
    function update() {
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    logo = :logo,
                    description = :description,
                    category_id  = :category_id
                WHERE
                    id = :id";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // очистка
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->logo = htmlspecialchars(strip_tags($this->logo));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // привязка значений
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":logo", $this->logo);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":id", $this->id);

        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    // выбираем товары по поисковому запросу
    public function search($search_term) {
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.image, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ?
            ORDER BY
                p.name ASC";

        $stmt = $this->conn->prepare($query);

        $search_term = "%{$search_term}%";
        $stmt->bindParam(1, $search_term);
        $stmt->bindParam(2, $search_term);

        $stmt->execute();

        return $stmt;
    }
    // метод для подсчёта общего количества строк
    public function countAll_BySearch($search_term) {
        // запрос
        $query = "SELECT
                COUNT(*) as total_rows
            FROM
                " . $this->table_name . " p 
            WHERE
                p.name LIKE ? OR p.description LIKE ?";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // привязка значений
        $search_term = "%{$search_term}%";
        $stmt->bindParam(1, $search_term);
        $stmt->bindParam(2, $search_term);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row["total_rows"];
    }
    // загрузка файла изображения на сервер
    function uploadPhoto() {
        $result_message = "";

        if ($this->image) {
            $target_directory = dirname(__DIR__) . "/static/";
            $target_file = $target_directory . $this->image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            $file_upload_error_messages = "";
        } else {
            return false;
        }

        $check = getimagesize($_FILES["image"]["tmp_name"]);

        if ($check == false) {
            $file_upload_error_messages .= "<div>Отправленный файл не является изображением.</div>";
            return false;
        }

        $allowed_file_types = array("jpg", "jpeg", "png", "gif");

        if (!in_array($file_type, $allowed_file_types)) {
            $file_upload_error_messages .= "<div>Разрешены только файлы JPG, JPEG, PNG, GIF.</div>";
            return false;
        }

        if (file_exists($target_file)) {
            $file_upload_error_messages .= "<div>Изображение уже существует. Попробуйте изменить имя файла.</div>";
        }

        if ($_FILES["image"]["size"] > (1024000)) {
            $file_upload_error_messages .= "<div>Размер изображения не должен превышать 1 МБ.</div>";
        }

        if (!is_dir($target_directory)) {
            mkdir($target_directory, 0777, true);
        }

        if (empty($file_upload_error_messages)) {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            } else {
                $result_message .= "<div class='alert alert-danger'>";
                    $result_message .= "<div>Невозможно загрузить фото.</div>";
                    $result_message .= "<div>Обновите запись, чтобы загрузить фото снова.</div>";
                $result_message .= "</div>";
            }
        }

        else {
            $result_message .= "<div class='alert alert-danger'>";
                $result_message .= "{$file_upload_error_messages}";
                $result_message .= "<div>Обновите запись, чтобы загрузить фото.</div>";
            $result_message .= "</div>";
        }

        return $result_message;
    }
}