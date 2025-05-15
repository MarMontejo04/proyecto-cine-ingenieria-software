<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
</head>


<body >
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="row justify-content-md-center">
        <div class="col-md-5 col-lg-4">
            <div>
                <h1 class="h1 text-center mb-3 mt-3">Registrarse</h1>
            </div>
            <form method="POST" action="./logica/crearCuenta.php">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control " name="nombre" required />
                    </div>
                    <div class="col-12">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellido_paterno" required />
                    </div>
                    <div class="col-12">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellido_materno" required />
                    </div>
                    <div class="col-12">
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control" name="correo" required />
                    </div>
                    <div class="col-12">
                        <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_de_nacimiento" required />
                    </div>
                    <div class="col-12">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" name="telefono" required />
                    </div>
                    <div class="col-12">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" required />
                    </div>

                    <button class="btn btn-lg text-white gradient-custom" type="submit">Registrarse</button>
                    <div class="text-center">
                        <p>¿Tienes cuenta? <a class="link-opacity-25-hover mb-1" href="./Login.php">Ingresa</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <footer>  
        <?php include "./estilos/footer.php"; ?>
    </footer>

</body>

</html>