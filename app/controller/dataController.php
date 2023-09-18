<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = $_POST['jsonData'];

    if (empty($jsonData)) {
        echo json_encode(['error' => 'No se recibieron datos.']);
    } else {
        $data = json_decode($jsonData, true);

        // Configuración de la base de datos
        $hostname = 'localhost'; // Cambia esto al nombre de tu servidor de base de datos
        $username = 'root'; // Cambia esto a tu nombre de usuario de la base de datos
        $password = ''; // Cambia esto a tu contraseña de la base de datos
        $database = 'data_off'; // Cambia esto al nombre de tu base de datos

        try {
            $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Itera sobre los datos y guárdalos en la base de datos
            foreach ($data as $item) {
                $nombre = $item['name'];
                $valor = $item['value'];
                $stmt = $pdo->prepare('INSERT INTO tbl_users (`name`, `email`) VALUES (?, ?)');
                $stmt->execute([$nombre, $valor]);
            }

            echo json_encode(['message' => 'Datos guardados con éxito.']);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error al guardar los datos: ' . $e->getMessage()]);
        }
    }
}
