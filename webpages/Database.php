<?php
class Database {
    private $servername = "db-myclean.cj8k0cuo8rz4.ap-southeast-2.rds.amazonaws.com";
    private $username = "admin";
    private $password = "Success+3407"; // DB PW, actually need IAM
    private $dbname = "MYCLEANDB";
    public $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connect fail: " . $this->conn->connect_error);
        }
    }

    public function close() {
        $this->conn->close();
    }
}
