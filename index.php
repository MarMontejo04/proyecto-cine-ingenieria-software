<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="./estilos/estiloslogin.css">
</head>
<body>
    <header>
        <div class="header">
            logotipo
        </div>
    </header>
        <div class="contenido">
            <h1>Sign in</h1>
            <form method="POST"  action="./logica/loguear.php">
                <input type="email" name="correo" placeholder="Email" required/>
                <br><br>
                <input type="password" name="contrasena" placeholder="Contraseña" required/>
                <br><br>
                <button type="submit">Login</button>
            </form> 
            <form method="POST1"  action="./crearCuenta.php">
                    <button type="submit">¿No tienes cuenta?/ Creala</button>
            </form>
        </div>
</body>
</html>



   
