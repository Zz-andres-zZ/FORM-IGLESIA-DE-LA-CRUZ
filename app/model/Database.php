<?php

class Database {

    private $hostname = "mysql:host=localhost;dbname=tarea";
    private $username = "root";
    private $password = "";
    protected $connect;

    public function conection() {
        try {
            $this->connect = new PDO($this->hostname, $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connect;
        } catch (PDOException $er) {
            unset($this->connect);
            die("NO CONECTADO : {$er->getMessage()}");
        }
    }

    
}