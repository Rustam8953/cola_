<?php

class Product {
    // подключение к базе данных
    private $conn;
    private $table_name = "products";

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
                    name=:name, logo=:logo, description=:description, category_id=:category_id, created=:created";

        $stmt = $this->conn->prepare($query);

        // опубликованные значения
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->logo = htmlspecialchars(strip_tags($this->logo));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // получаем время создания записи
        $this->timestamp = date("Y-m-d H:i:s");

        // привязываем значения
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":logo", $this->price);
        $stmt->bindParam(":description", $this->description);
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
            products 
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
    // метод для получения одного товара
    function readOne() {
        $query = "SELECT
                    name, logo, description, category_id
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
}