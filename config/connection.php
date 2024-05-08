<?php

// Include the configuration file
require_once 'config/db_config.php';

    try {
        // PDO connection using defined constants
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // error handling 
      
        echo "Connected to database successfully!";
      
      } catch(PDOException $e) {
        echo "Error connecting to database: " . $e->getMessage();
      }

class Db {

    // Database connection properties
    private $host = DB_SERVER;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;
    private $db = null;

    // Connect to the database
    private function connect() {
        if ($this->db === null) {
            try {
                $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "<strong>Database connection error:</strong> " . $e->getMessage();
                exit;
            }
        }
        return $this->db;
    }

    // Execute SQL queries (INSERT, UPDATE, DELETE)
    public function dbQuery($sql) {
        $db = $this->connect();
        if ($db) {
            try {
                $stmt = $db->prepare($sql);
                $stmt->execute();
                return $stmt;
            } catch (PDOException $e) {
                echo "<div><strong>Invalid SQL query:</strong>" . $sql . "</div>";
                return false;
            }
        }
        return false;
    }

    // Fetch data as an associative array (SELECT queries)
    function dbGetArray($sql) {
        $res = $this->dbQuery($sql);
        if ($res) {
            $data = [];
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            if (is_array($data) && count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Escape and prepare data for SQL queries
    function dbFix($var) {
        if (!is_numeric($var)) {
            $var = $this->connect()->quote($var);
        }
        return $var;
    }

    // Get form data (GET and POST)
    function getVar($name) {
        $var = null;
        if (isset($_GET[$name])) {
            $var = $_GET[$name];
        } elseif (isset($_POST[$name])) {
            $var = $_POST[$name];
        }
        return $var;
    }

    // Display an array in a human-readable format
    function show($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}

// Create a Db object for database interactions
$database = new Db;

    
?>