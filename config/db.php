<?php

class Database {
    private $host = "localhost";
    private $db_name = "cola_db";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            if ($this->conn) {
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET CHARACTER SET utf8");
                $this->conn->exec("SET NAMES 'utf8'");
            } else {
                echo "Ошибка соединения: " . $exception->getMessage();
            }
        } catch (PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}?>