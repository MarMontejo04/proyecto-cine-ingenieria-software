<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link href="./estilos/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="./estilos/style.css" rel="stylesheet">
</head>


<body>
    <header class="p-3 mb-3 gradient-custom">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a class="nav-link px-2 text-white fs-5" href="./index.php">Cartelera</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 text-white fs-5" href="">|</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 text-white fs-5" href="">Promociones</a>
                    </li>
                </ul>
                <a class="navbar-brand px-2 text-center text-white d-block " href="#">
                    <span class="d-block h4 mb-0 fw-bold">VÉRTIGO</span>
                    <span class="d-block h5">FILMS</span>
                </a>
                <img src="./media/LOGOVERTIGO.PNG" width="70" height="70" class="ms-3">
            </div>
        </div>
    </header>

    <div class="row justify-content-md-center">
        <div class="col-md-5 col-lg-4">
            <div>
                <h1 class="h1 text-center mb-3 mt-3 bold">Registrarse</h1>
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
                        <p>¿Tienes cuenta? <a class="link-opacity-25-hover mb-1" href="./Login.php">Ingresa</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <footer class="bd-footer py-4 mt-5 gradient-custom">
        <div class="container text-white">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <img src="./media/LOGOVERTIGO.PNG" alt="Logo Vértigo" width="50" height="50">
                    <span class="mb-3 mb-md-0">© 2025 Vértigo Films, Inc</span>
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <a href="https://www.instagram.com" target="_blank" class="text-white me-3">
                        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://www.facebook.com" target="_blank" class="text-white">
                        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>