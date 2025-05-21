<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <!-- <link href="./estilos/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="row justify-content-md-center pb-5">
        <div class="col-md-5 col-lg-4">
            <div>
                <h1 class="h1 text-center mb-3 mt-3 bold">Registrarse</h1>
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
                        <label for="contrasena">contrasena</label>
                        <input type="password" class="form-control" name="contrasena" required />
                    </div>

                    <button class="btn btn-lg text-white gradient-custom" type="submit">Registrarse</button>
                    <div class="text-center pb-5">
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