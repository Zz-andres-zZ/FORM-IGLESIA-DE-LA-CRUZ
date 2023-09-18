<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FORM REGISTER</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="asset/bs/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/main.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h1>Formulario de Registro</h1>
                    </div>

                    <div class="card-body p-3">
                        <form method="POST" id="form_register">
                            <input type="text" name="nombre" placeholder="Nombre">
                            <input type="email" name="email" placeholder="Email">
                            <button id="register" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="asset/jquery/jquery.js"></script>
    <script src="asset/bs/bs.js"></script>
    <!-- <script src="asset/js/auth.js"></script> -->
    <script src="asset/js/dataOff.js"></script>

</body>

</html>