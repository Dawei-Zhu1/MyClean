<?php
include_once __DIR__ . '/includes/config.php';

class Database
{
    private string $servername = DB_HOST;
    private string $username = DB_USER;
    private string $password = DB_PASS; // DB PW, actually need IAM
    private string $dbname = DB_NAME;
    public mysqli $conn;

    public function __construct()
    {
        /*Check IP, if local, then test locally*/
        $ip = getenv('HTTP_CLIENT_IP') ?:
            getenv('HTTP_X_FORWARDED_FOR') ?:
                getenv('HTTP_X_FORWARDED') ?:
                    getenv('HTTP_FORWARDED_FOR') ?:
                        getenv('HTTP_FORWARDED') ?:
                            getenv('REMOTE_ADDR');
        if ($ip == "127.0.0.1") {
            $this->servername = $ip . ':3306';
        }
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connect fail: " . $this->conn->connect_error);
        }
    }

    public function getUser(string $id_type, $data): bool|array|null
    {
        $stmt = "";
        switch ($id_type) {
            case "uid":
                /* Search with uid */
                $stmt = $this->conn->prepare("SELECT * FROM USER WHERE id = ?");
                break;
            case "email":
                /* Search with email, return password and uid */
                $stmt = $this->conn->prepare("SELECT id, password FROM USER WHERE email = ?");
                break;
        }
        $stmt->bind_param("s", $data);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /** To add the user to db
     * @param $first_name
     * @param $last_name
     * @param $dob
     * @param $email
     * @param $phone
     * @param $address1
     * @param $address2
     * @param $city
     * @param $state
     * @param $postcode
     * @param $password
     * @return bool
     */
    public function addUser($first_name, $last_name, $dob, $email, $phone,
                            $address1, $address2, $city, $state, $postcode,
                            $password
    ): bool
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
        return $stmt->store_result();
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
        $_query = "INSERT INTO $table ($column) VALUES ($value)";
        return $this->pass_query($_query);
    }


    /** This private function will pass every query to MySQL
     * @param string $query
     * @return bool whether success
     */
    public function pass_query(string $query): array
    {
        $result = $this->conn->query($query);
        // Fetch results (if SELECT)
        if ($result instanceof mysqli_result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $result->free();
            $this->conn->close();
            return $data;
        }

        // If INSERT, UPDATE, DELETE, etc.
        $affectedRows = $this->conn->affected_rows;
        $this->close();
        return $affectedRows;
    }

    public function close()
//        Close the connection
    {
        $this->conn->close();
    }


}
