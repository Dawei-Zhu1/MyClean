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
            echo 'connection error';
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
        $stmt = $this->conn->prepare("INSERT INTO `USER` (first_name, last_name, DoB,email, phone, 
                  address1, address2, city, state, postcode,
                  password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss",
            $first_name, $last_name, $dob,
            $email, $phone,
            $address1, $address2, $city, $state, $postcode, $hashed_password);
        $stmt->execute();
        return $stmt->store_result();
    }

    /*1. Generate order*/
    public function createOrder($uid, $customer_name, $address, array $services,
                                $room_quantity, $bathroom_quantity, $kitchen_quantity,
                                $planned_datetime): int
    {
        $stmt = $this->conn->prepare("INSERT INTO `MYCLEANDB`.`ORDER` (`client_id`, `name`, `address`, `payment_finished`, `created_datetime`, `planned_datetime`)
                                            VALUES (?, ?, ?, 'default', NOW() ,?)");
        $stmt->bind_param("isss", $uid, $customer_name, $address, $planned_datetime);
        $stmt->execute();
        // Get the last id
        $order_id = $stmt->insert_id;
        /*2. Generate service record*/
        $stmt = $this->conn->prepare("INSERT INTO ORDER_SERVICE (orderID, service_id) VALUES (?, ?)");
        foreach (array_keys($services) as $service_id) {
            $stmt->bind_param("ii", $order_id, $service_id);
            $stmt->execute();
        }
        /*3. Room record*/

        $rooms = [
            ['room_service_type' => 1, 'amount' => $room_quantity], // Room
            ['room_service_type' => 2, 'amount' => $bathroom_quantity], // Bathroom
            ['room_service_type' => 3, 'amount' => $kitchen_quantity], // kitchen
        ];
        $stmt = $this->conn->prepare("INSERT INTO ORDER_ROOMS (order_id, room_service_type, amount) VALUES (?, ?, ?)");
        foreach ($rooms as $room) {
            if ($room['amount']) {
                $stmt->bind_param("iii", $order_id, $room['room_service_type'], $room['amount']);
                $stmt->execute();
            }
        }
        return $order_id;
    }

    public function calculatePrice(string $order_id): void
    {

        if ($this->conn->connect_errno) {
            die("Failed to connect: " . $this->conn->connect_error);
        }

// Prepare line items array and total
        $line_items = [];
        $total_price = 0;

// 1. Get services
        $stmt = $this->conn->prepare("
    SELECT s.name AS item, s.price AS unit_price
    FROM ORDER_SERVICE os
    JOIN SERVICE s ON os.service_id = s.id
    WHERE os.orderID = ?
");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $line_items[] = [
                'item' => $row['item'],
                'quantity' => 1,
                'unit_price' => $row['unit_price'],
                'subtotal' => $row['unit_price']
            ];
            $total_price += $row['unit_price'];
        }

// 2. Get rooms
        $stmt = $this->conn->prepare("
    SELECT rs.name AS item, rs.price AS unit_price, orr.amount AS quantity
    FROM ORDER_ROOMS orr
    JOIN ROOM_SERVICE rs ON orr.room_service_type = rs.id
    WHERE orr.order_id = ?
");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $subtotal = $row['unit_price'] * $row['quantity'];
            $line_items[] = [
                'item' => $row['item'],
                'quantity' => $row['quantity'],
                'unit_price' => $row['unit_price'],
                'subtotal' => $subtotal
            ];
            $total_price += $subtotal;
        }

// 3. Display line items
        echo "<h3>Order Summary (ID: {$order_id})</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Item</th><th>Qty</th><th>Unit Price ($)</th><th>Subtotal ($)</th></tr>";

        foreach ($line_items as $item) {
            $subtotal =  number_format((float)$item['subtotal'],2);
            echo "<tr>
            <td>{$item['item']}</td>
            <td>{$item['quantity']}</td>
            <td>{$item['unit_price']}</td>
            <td>{$subtotal}</td>
          </tr>";
        }
        $gst = (float)$total_price * 0.09;
        echo "<span>GST:{$gst}</span>";
        echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>\$ {$total_price}</strong></td></tr>";
        echo "</table>";

    }


    /**
     * @param string $table name of a table
     * @param string $column column names of a table
     * @param string $value values in these columns
     * @return bool
     */
    private function select($query): array
    {
        $result = $this->conn->query($query);
        // Error handling
        if (!$result) {
            die("Query error: " . $this->conn->error);
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

    }

    /** Insert into the database
     * @param string $table name of a table
     * @param string $column columns of a table
     * @param string $value values in these columns
     * @return bool
     */
    private function insert(string $table, string $column, string $value): array
    {
        $_query = "INSERT INTO $table ($column) VALUES ($value)";
        return $this->pass_query($_query);
    }


    /** This private function will pass every query to MySQL
     * @param string $query
     * @return array the affected rows
     */
    public function pass_query(string $query): array|bool
    {
        // Run query
        $result = $this->conn->query($query);
        // Error handling
        if (!$result) {
            die("Query error: " . $this->conn->error);
        }
        // If INSERT, UPDATE, DELETE, etc.
        return $this->conn->affected_rows;
    }

    public function get_roles(): array
    {
        $data = $this->select("SELECT * FROM `ROLE`");
        $roles = array();
        foreach ($data as $row) {
            $roles[$row['id']] = $row['name'];
        }
        return $roles;
    }

    public function role_to_id(string $name): int
    {
        $data = $this->select("SELECT * FROM `ROLE` WHERE `name` = '$name'");
        $role_to_id = array(/*'user' => 1,'admin' => 2*/);
        foreach ($data as $item) {
            $role_to_id[$item['name']] = $item['id'];
        }
        return array_values($role_to_id)[0];
    }

    public function id_to_role(int $role_id): array
    {
        $data = $this->select("SELECT * FROM `ROLE` WHERE `id` = '$role_id'");
        $id_to_role = array(/*'user' => 1,'admin' => 2*/);
        foreach ($data as $item) {
            $id_to_role[$item['id']] = $item['name'];
        }
        return $id_to_role;
    }

    public function close()
//        Close the connection
    {
        $this->conn->close();
    }


}
