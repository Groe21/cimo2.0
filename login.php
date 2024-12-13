<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="img/logocimo.ico">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- login css-->
    <link href="css/login.css" rel="stylesheet" />

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="position-relative" style="width: 100%; max-width: 400px;">
            <div class="image-container">
                <img class="img-rounded" src="assets/img/logocimo.ico" style="width: 60%;" class="shadow-sm">
            </div>
            <div class="card p-4 shadow login-container">
                <h2 class="card-title text-center mb-4">Inicio Sesión</h2>
                <!-- Formulario de inicio de sesión -->
                <form action="models/usuario/autenticacion.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label"><strong>Usuario</strong></label>
                        <input type="text" class="form-control" name="usuario" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>Contraseña</strong></label>
                        <input type="password" class="form-control" name="pass" placeholder="" autocomplete="off">
                    </div>
                    <div class="d-flex justify-content-center mt-3 p-1">
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn btn-warning">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>