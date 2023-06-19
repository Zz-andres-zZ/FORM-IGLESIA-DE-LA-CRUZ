<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FORM REGISTER</title>
    <style>
        .row {
            margin: 0;
        }

        .content-form {
            width: 700px;
            max-width: 100%;
            margin: auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<body>

    <div class="container">
        <div class="row mt-4">
            <div class="content-form border-1">
                <div class="card-header text-center">
                    <h1>Formulario de Registro</h1>
                </div>
                <div class="card-body p-4">
                    <form calss="" id="form_register">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese su nombre">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Ingrese su apellido">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Ingrese su teléfono">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="address[addreess]" id="address" placeholder="Ingrese su dirección">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="state" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="address[state]" id="state" placeholder="Ingrese su estado">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="address[city]" id="city" placeholder="Ingrese su ciudad">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="neighborhood" class="form-label">Barrio</label>
                                <input type="text" class="form-control" name="address[neighborhood]" id="neighborhood" placeholder="Ingrese su barrio">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="date_birth" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="date_birth" id="date_birth">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="identity_card" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="identity_card" id="identity_card" placeholder="Ingrese su cédula">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" id="register" class="btn btn-primary w-25">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="asset/js/auth.js"></script>

</body>

</html>