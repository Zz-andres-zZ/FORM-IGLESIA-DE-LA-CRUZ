<?php

require_once "../model/Users_model.php";

try {
    if (isset($_POST['register']) && !empty($_POST)) {
        $name = isset($_POST['name']) ? trim($_POST['name']) : "";
        $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : "";
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
        $address = isset($_POST['address']) ? trim($_POST['address']) : "";
        $address = isset($_POST['address']["state"]) ? trim($_POST['address']["state"]) : "";
        $identity_card = isset($_POST['identity_card']) ? trim($_POST['identity_card']) : "";
        $birthday_date = isset($_POST['birthday_date']) ? trim($_POST['birthday_date']) : "";

        $instancia_register = new Users_model(); 

        $instancia_register->name = $name;
        $instancia_register->last_name = $last_name;
        $instancia_register->phone = $phone;
        $instancia_register->address = $address;
        $instancia_register->identity_card = $identity_card;
        $instancia_register->birthday_date = $birthday_date;

        /* INSERTAMOS DATA EN LA BASE DE DATOS */
        $data = $instancia_register->set_data_register();

        // SI USUARIO NO EXISTE RETORNO 404
        if (!$data) {
            echo 404;
            die("ERROR");
        }
        echo 200;
    }
} catch (PDOException $error) {
    die("ERROR TO REGISTER {$error->getMessage()}");
}
