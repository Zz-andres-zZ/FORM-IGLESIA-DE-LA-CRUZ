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
            $db = $instance->conection();
            $sql = "INSERT INTO `tbl_usuarios` (`name`,`lastname`, `phone`, `address`, `state`, `city`, `neighborhood`, `identity_card`, `birthday_date`) VALUES (:name, :lastname, :phone, :address, :state, :city, :neighborhood, :identity_card, :birthday_date)";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":lastname", $this->last_name);
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

    /* public function get_data_database() {
        $instance = new Database();
        $db = $instance->conection();

        $stmt = $db->prepare("SELECT * FROM `tbl_usuarios`");
        $stmt->execute();
        $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resul;
    } */
}
