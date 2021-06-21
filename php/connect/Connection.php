<?php 
    class Connection{
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "bd_tienda";
        
        function getConnection(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $conn;
        }
    }
?>