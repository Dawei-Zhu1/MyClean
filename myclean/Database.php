<?php

class Database
{
    private $servername = "db-myclean.cj8k0cuo8rz4.ap-southeast-2.rds.amazonaws.com";
    private $username = "admin";
    private $password = "Success+3407"; // DB PW, actually need IAM
    private $dbname = "MYCLEANDB";
    public $conn;

    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connect fail: " . $this->conn->connect_error);
        }
    }

    public function addUser($first_name, $last_name, $dob,
                            $email, $phone,
                            $address1, $address2, $city, $state, $postcode,
                            $password
    )
    {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare the statement
        $stmt = $this->conn->prepare("INSERT INTO USER (first_name, last_name, DoB,
                  email, phone, 
                  address1, address2, city, state, postcode, password) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss",
            $first_name, $last_name, $dob,
            $email, $phone,
            $address1, $address2, $city, $state, $postcode, $hashed_password);
        $stmt->execute();
        $stmt->store_result();
    }


    /**
     * @param string $table name of a table
     * @param string $column column names of a table
     * @param string $value values in these columns
     * @return bool
     */
    private function select(string $table, string $column, string $value): bool
    {
        $_query = "SELECT $column FROM $table";
        return $this->pass_query("SELECT $column FROM $table $value");

    }

    /** Insert into the database
     * @param string $table name of a table
     * @param string $column columns of a table
     * @param string $value values in these columns
     * @return bool
     */
    private function insert(string $table, string $column, string $value): bool
    {
        $_query = "INSERT INTO {$table} ($column) VALUES ($value)";
        return $this->pass_query($_query);
    }


    /** This private function will pass every query to MySQL
     * @param string $query
     * @return bool whether success
     */
    private function pass_query(string $query): bool
    {
        $this->conn->query($query);
        return true;
    }

    public function close()
//        Close the connection
    {
        $this->conn->close();
    }


}
