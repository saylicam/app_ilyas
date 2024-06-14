<?php
// Configuration de la connexion à la base de données
class Database {
    private $host = "sql304.infinityfree.com";
    private $db_name = "if0_36730779_app_ilyas";
    private $username = "if0_36730779";
    private $password = "OpSDbetMxdfpHO";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try {
            // Établir la connexion à la base de données avec PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>


