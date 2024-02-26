<?php

class Category
{
    private $conn;
    private $table_name = "categories";

    public $id;
    public $name;
    public $path_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    // метод для вывода категорий
    function read() {
        $query = "SELECT
                    id, name, path_name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readOne($id_cat) {
        $query = "SELECT * FROM
            " . $this->table_name . "
            WHERE
            id = $id_cat";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    // получение названия категории по её ID
    function readName() {
        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row["name"];
    }
}?>