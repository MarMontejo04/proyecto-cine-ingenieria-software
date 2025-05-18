<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">

</head>

<body class="fondo text-white h-100">
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

   <div class="row justify-content-md-center p-5 min-vh-100">
        <div class="col-md-5 col-lg-4">
            <div>
                <h1 class="h1 text-center mb-4">Iniciar Sesion</h1>
            </div>
            <form method="POST" action="./logica/loguear.php">
                <div class="row g-3">
                    
                    <div class="col-12">
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control w-100" name="correo" required />
                    </div>
                    
                    <div class="col-12">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" class="form-control w-100" name="contraseña" required />
                    </div>

                    <div class="col-12">
                        <button class="btn btn-lg text-white gradient-custom w-100" type="submit">Iniciar Sesion</button>
                    </div>
                    
                    <div class="col-12 text-center">
                        <p>¿No tienes cuenta? 
                            <a class="text-white link-opacity-25-hover text-opacity-75" href="./crearCuenta.php">Crear cuenta</a>
                        </p>
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