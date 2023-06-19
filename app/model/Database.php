<?php

class Database {

    private $hostname = "mysql:host=localhost;dbname=auth";
    private $username = "root";
    private $password = "";
    protected static $conect;

    public function conection() {
        try {
            $this->conect = new PDO($this->hostname, $this->username, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conect;
        } catch (PDOException $er) {
            unset($this->conect);
            die("NO CONECTADO : {$er->getMessage()}");
        }
    }
}
