<?php

class ProductInfo {
    private $conn;
    private $table_name = "product_info";

    public $id;
    public $name;
    public $description;
    public $product_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create() {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, description=:description, product_id=:product_id";

        $stmt = $this->conn->prepare($query);
        
        $this->name = array_map('htmlspecialchars', array_map('strip_tags', $this->name));
        $this->description = array_map('htmlspecialchars', array_map('strip_tags', $this->description));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));

        foreach ($this->name as $key => $value) {
            $stmt->bindParam(':name', $value);
            $stmt->bindParam(':description', $this->description[$key]);
            $stmt->bindParam(':product_id', $this->product_id);
            $stmt->execute();
        }
    }
}
?>