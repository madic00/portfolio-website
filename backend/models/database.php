<?php 

    $confPath = $_SERVER['DOCUMENT_ROOT'] . "/portfolio-website/backend/config/config.php";
    require_once $confPath;

    class Database {
        
        private $conn;

        function __construct() {
            $this->openConnection();
        }

        public function getConn() {
            return $this->conn;
        }

        public function openConnection() {

            try {
                $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8", USER, PASS);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $ex) {
                die("Error establishing connection to database. Try again later");
            }
        }

        public function lastInsertId() {
            return $this->conn->lastInsertId();
        }

        public function execQuery($sql, $data = []) {
            $stmt = $this->conn->prepare($sql);

            try {
                $stmt->execute($data);
                return $stmt->fetchAll();
            } catch(PDOException $ex) {
                return "Query failed: " . $stmt->errorInfo()[2];
            }
        }

    }

    $db = new Database();

?>