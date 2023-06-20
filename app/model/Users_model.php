<?php

require_once "../model/Database.php";

class Users_model {

    public $name;
    public $last_name;
    public $phone;
    public $address;
    public $state;
    public $city;
    public $neighborhood;
    public $identity_card;
    public $birthday_date;

    public function set_data_register() {
        try {
            $instance = new Database();
            $pdo = $instance->conection();
            $sql = "INSERT INTO `tbl_users` (`name`,`last_name`, `phone`, `address`, `state`, `city`, `neighborhood`, `identity_card`, `birthday_date`) VALUES (:name, :last_name, :phone, :address, :state, :city, :neighborhood, :identity_card, :birthday_date)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":address", $this->address);
            $stmt->bindParam(":state", $this->state);
            $stmt->bindParam(":city", $this->city);
            $stmt->bindParam(":neighborhood", $this->neighborhood);
            $stmt->bindParam(":identity_card", $this->identity_card);
            $stmt->bindParam(":birthday_date", $this->birthday_date);
            $stmt->execute();
        } catch (PDOException $error) {
            $response = ['Error' => 'error' . $error->getMessage()];
            echo "<pre>";
            print_r([
                'ERROR REGISTRAR USUARIO' => json_encode($response)
            ]);
            echo "</pre>";
            die();
        }
        return 200;
    }

    public function checkIdentityCardExists($identityCard) {
        $instance = new Database();
        $pdo = $instance->conection();
        $query = "SELECT COUNT(*) FROM `tbl_users` WHERE identity_card = :identityCard";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":identityCard", $identityCard);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return ($count > 0);
    }

    public function get_data_database() {
        $instance = new Database();
        $pdo = $instance->conection();
        $stmt = $pdo->prepare("SELECT * FROM `tbl_users`");
        $stmt->execute();
        $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resul;
    }
}
