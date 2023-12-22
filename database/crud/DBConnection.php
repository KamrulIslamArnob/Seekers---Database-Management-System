<?php

class DBConnection {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '1';
    private $database = 'seekers_database';

    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }
}

?>
