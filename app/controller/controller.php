<?php
require_once "../model/Users_model.php";

try {
    if ($_POST) {

        $php_errormsg = [];
        $php_validmsg = [];

        $data_post = [
            "name" => $_POST['name'] ?? "",
            "last_name" => $_POST['last_name'] ?? "",
            "phone" => $_POST['phone'] ?? "",
            "email" => $_POST['email'] ?? "",
            "address" => $_POST['address']['address'] ?? "",
            "state" => $_POST['address']['state'] ?? "",
            "city" => $_POST['address']['city'] ?? "",
            "neighborhood" => $_POST['address']['neighborhood'] ?? "",
            "dni" => $_POST['dni'] ?? "",
            "birthday_date" => $_POST['birthday_date'] ?? "",
        ];

        foreach ($data_post as $id => $field) {
            if (empty($field)) {
                $php_errormsg[$id] = "Este campo es obligatorio";
            }
        }

        if (!filter_var($data_post["email"], FILTER_VALIDATE_EMAIL)) {
            $php_errormsg[] = "El email es invalido";
        }

        if (!filter_var($data_post["phone"], FILTER_VALIDATE_FLOAT)) {
            $php_errormsg[] = "El telefono es invalido";
        }

        if (!empty($php_errormsg)) {
            http_response_code(422);
            echo json_encode($php_errormsg);
            die;
        }

        // CREAMOS UNA INSTANCIA DEL MODELO DE USUARIO
        $instancia_register = new Users_model();

        // VERIFICAMOS SI YA EXISTE UN VALOR PARA "dni" EN LA BASE DE DATOS
        if ($instancia_register->checkIdentityCardExists($data_post["dni"])) {
            $php_errormsg["dni"] = "Este documento ya existe";
            http_response_code(422);
            echo json_encode($php_errormsg);
            die;
        }

        // HACEMOS UN RECORRIDO POR CADA VALOR PARA INSERTARLO A LA DB
        foreach ($data_post as $key => $value) {
            $instancia_register->$key = $value;
        }

        // GUAQRDAMOS EN UNA VARIABLE Y INSERTAMOS LOS DATOS A LA DB
        $data = $instancia_register->set_data_register();

        // SI DATA NOS LLEGA VACIO, ARROJAMOS UN 404
        if (!$data) {
            http_response_code(404);
            die;
        }

        $response = [
            "success" => true,
            "message" => mb_convert_encoding("Registro Exitoso", "UTF-8"), // se utiliza para convertir la cadena al formato UTF-8
            "records" => $instancia_register->get_data_database(),
        ];

        echo json_encode($response);
    }
} catch (PDOException $error) {
    http_response_code(422);
    die("ERROR TO REGISTER {$error->getMessage()}");
}
