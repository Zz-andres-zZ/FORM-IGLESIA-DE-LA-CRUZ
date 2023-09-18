<?php

require_once "../model/DBConnection.php";

class Users_model {

    // Propiedades de la clase
    public $name;
    public $last_name;
    public $phone;
    public $email;
    public $address;
    public $state;
    public $city;
    public $neighborhood;
    public $identity_card;
    public $birthday_date;

    /**
     * Inserta un nuevo usuario en la base de datos.
     * 
     * @return int Retorna un código HTTP 200 si la inserción es exitosa.
     * @throws PDOException Si ocurre un error en la base de datos.
     */
    public function set_data_register() {
        try {
            // Validar que los campos obligatorios no estén vacíos antes de insertar.
            if (empty($this->name) || empty($this->identity_card) || empty($this->email)) {
                return 422; // Bad Request
            }

            $instance = new DBConnection();
            $pdo = $instance->connect();
            $sql = "INSERT INTO `tbl_users` (`name`,`last_name`, `phone`,`email`, `address`, `state`, `city`, `neighborhood`, `identity_card`, `birthday_date`) VALUES (:name, :last_name, :phone, :email, :address, :state, :city, :neighborhood, :identity_card, :birthday_date)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":address", $this->address);
            $stmt->bindParam(":state", $this->state);
            $stmt->bindParam(":city", $this->city);
            $stmt->bindParam(":neighborhood", $this->neighborhood);
            $stmt->bindParam(":identity_card", $this->identity_card);
            $stmt->bindParam(":birthday_date", $this->birthday_date);
            $stmt->execute();
            return 200; // OK
        } catch (PDOException $error) {
            $response = ['Error' => 'error' . $error->getMessage()];
            echo "<pre>";
            print_r([
                'ERROR REGISTRAR USUARIO' => json_encode($response)
            ]);
            echo "</pre>";
            // Manejar el error de manera apropiada, por ejemplo, puedes registrar el error en un archivo de registro.
            return 500; // Internal Server Error
        }
    }

    /**
     * Comprueba si una identificación (identity card) ya existe en la base de datos.
     * 
     * @param string $identityCard El número de identificación a verificar.
     * @return bool Retorna true si la identificación ya existe, de lo contrario, false.
     * @throws PDOException Si ocurre un error en la base de datos.
     */
    public function checkIdentityCardExists($identityCard) {
        $instance = new DBConnection();
        $pdo = $instance->connect();
        $query = "SELECT COUNT(*) FROM `tbl_users` WHERE identity_card = :identityCard";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":identityCard", $identityCard);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return ($count > 0);
    }

    /**
     * Obtiene todos los datos de usuarios desde la base de datos.
     * 
     * @return array Un arreglo de usuarios.
     * @throws PDOException Si ocurre un error en la base de datos.
     */
    public function get_data_database() {
        $instance = new DBConnection();
        $pdo = $instance->connect();
        $stmt = $pdo->prepare("SELECT * FROM `tbl_users`");
        $stmt->execute();
        $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resul;
    }
}
