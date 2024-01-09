<?php
class Database {
    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        else{
            //echo "connection success";
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function select($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            die("Error in select query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            die("Error in fetching results: " . $stmt->error);
        }

        $rows = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        return $rows;
    }

    public function insert($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            die("Error in insert query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return $this->conn->insert_id;
        } else {
            die("Error in insert operation: " . $stmt->error);
        }

        $stmt->close();
    }

    public function update($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            die("Error in update query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            die("Error in update operation: " . $stmt->error);
        }

        $stmt->close();
    }

    public function delete($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        
        if ($stmt === false) {
            die("Error in delete query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            die("Error in delete operation: " . $stmt->error);
        }

        $stmt->close();
    }
}
