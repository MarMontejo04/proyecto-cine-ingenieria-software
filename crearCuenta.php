<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link href="./estilos/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT">
    <link href="./estilos/style.css" rel="stylesheet">
</head>


<body>
    <header class="p-3 mb-3 gradient-custom">
        <div class="container">
            <div class="d-flex align-item-center justify-content-center justify-content-xl-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a class="nav-link px-2 text-white" href="./index.php">Cartelera</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 text-white" href="">|</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 text-white" href="">Promociones</a>
                    </li>
                </ul>
                <a class="navbar-brand px-2 text-white" href="#">
                    Vertigo Cine
                    <img src="./media/fes-aragon.png" width="40" height="">
                </a>
            </div>
        </div>
    </header>

    <div class="row justify-content-md-center">
        <div class="col-md-5 col-lg-4">
            <div>
                <h1 class="h1 text-center mb-3">Registrarse</h1>
            </div>
            <form method="POST" action="./logica/crearCuenta.php">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre" required />
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
                        <a class="link-opacity-25-hover mb-1" href="./Login.php">¿Tienes cuenta?</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    </form>
    </div>
</body>

</html>