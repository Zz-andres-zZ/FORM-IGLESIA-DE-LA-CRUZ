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

                            <div class="row row-group-imput">
                                <div class="col-12 col-md-6 group-input">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese su nombre">
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="last_name" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Ingrese su apellido">
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="row row-group-imput">
                                <div class="col-12 col-md-6 group-input">
                                    <label for="dni" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese su cédula">
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="col-12 col-md-6 group-input">
                                    <label for="birthday_date" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="birthday_date" id="birthday_date">
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="row row-group-imput">
                                <div class="col-12 col-md-6 group-input">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Ingrese su teléfono">
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="col-md-6 group-input">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo">
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="row row-group-imput">
                                <div class="col-md-4 group-input">
                                    <label for="state" class="form-label">Estado</label>
                                    <input type="text" class="form-control" name="address[state]" id="state" placeholder="Ingrese su estado">
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="col-md-4 group-input">
                                    <label for="city" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" name="address[city]" id="city" placeholder="Ingrese su ciudad">
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="neighborhood" class="form-label">Barrio</label>
                                    <input type="text" class="form-control" name="address[neighborhood]" id="neighborhood" placeholder="Ingrese su barrio">
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="row row-group-imput">
                                <div class="col-12">
                                    <label for="address" class="form-label">Dirección</label>
                                    <textarea class="form-control" name="address[address]" id="address" cols="30" rows="3"></textarea>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-6 text-center">
                                    <input type="reset" id="clear" value="Limpiar campos" class="btn btn-danger">
                                </div>
                                <div class="col-6 text-center">
                                    <input type="submit" id="register" name="register" value="Registrar usuario" class="btn btn-primary">
                                </div>
                            </div>
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