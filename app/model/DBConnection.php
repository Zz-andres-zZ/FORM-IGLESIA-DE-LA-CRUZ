<?php

class DBConnection {

    private $hostname = "localhost";
    private $database = "tarea";
    private $username = "root";
    private $password = "";
    public $conn;

    /**
     * Crea una conexión a la base de datos y la retorna.
     * 
     * @return PDO|null Retorna una instancia de PDO si la conexión es exitosa, de lo contrario, retorna null.
     */
    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->hostname};dbname={$this->database}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->conn;
        } catch (PDOException $error) {
            $this->conn = null;
            die("ERROR EN LA CONEXIÓN => {$error->getMessage()}");
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}