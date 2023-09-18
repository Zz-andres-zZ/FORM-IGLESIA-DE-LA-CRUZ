<?php
require_once "../model/Users_model.php";

try {
    if ($_POST) {
        // Arreglos para manejar mensajes de error y éxito.
        $php_errormsg = [];
        $php_validmsg = [];

        // Recopilar datos del formulario en un arreglo.
        $data_post = [
            "name" => $_POST['name'] ?? "",
            "last_name" => $_POST['last_name'] ?? "",
            "phone" => $_POST['phone'] ?? "",
            "email" => $_POST['email'] ?? "",
            "address" => $_POST['address']['address'] ?? "",
            "state" => $_POST['address']['state'] ?? "",
            "city" => $_POST['address']['city'] ?? "",
            "neighborhood" => $_POST['address']['neighborhood'] ?? "",
            "identity_card" => $_POST['dni'] ?? "",
            "birthday_date" => $_POST['birthday_date'] ?? "",
        ];

        // Validación de campos obligatorios.
        foreach ($data_post as $id => $field) {
            if (empty($field)) {
                $php_errormsg[$id] = "Este campo es obligatorio";
            }
        }

        // Validación de email y teléfono.
        if (!filter_var($data_post["email"], FILTER_VALIDATE_EMAIL)) {
            $php_errormsg["email"] = "El email es inválido";
        }

        if (!filter_var($data_post["phone"], FILTER_VALIDATE_FLOAT)) {
            $php_errormsg["phone"] = "El teléfono es inválido";
        }

        // Si hay errores, responder con mensajes de error.
        if (!empty($php_errormsg)) {
            http_response_code(422);
            echo json_encode($php_errormsg);
            die;
        }

        // Crear una instancia del modelo de usuario.
        $instancia_register = new Users_model();

        // Verificar si el documento (dni) ya existe en la base de datos.
        if ($instancia_register->checkIdentityCardExists($data_post["identity_card"])) {
            $php_errormsg["identity_card"] = "Este documento ya existe";
            http_response_code(422);
            echo json_encode($php_errormsg);
            die;
        }

        // Asignar los datos al objeto modelo.
        foreach ($data_post as $key => $value) {
            $instancia_register->$key = $value;
        }

        // Realizar el registro en la base de datos.
        $data = $instancia_register->set_data_register();

        // Si el registro fue exitoso, responder con un mensaje de éxito y los registros.
        if (!$data || $data != 200) {
            http_response_code(422);

            $response = ['Error' => 'error'];
            echo json_encode($response);

            die;
        }

        $response = [
            "success" => true,
            "message" => mb_convert_encoding("Registro Exitoso", "UTF-8"), // se utiliza para convertir la cadena al formato UTF-8
            "records" => $instancia_register->get_data_database(),
            "data" => $data,
        ];

        echo json_encode($response);
    }
} catch (PDOException $error) {
    // Si ocurre un error en la base de datos, responder con un código de error 422.
    http_response_code(422);
    die("ERROR AL REGISTRAR {$error->getMessage()}");
}
