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
            <form method="POST" action="./logica/crearCuenta.php">
                <input type="text" name="nombre" placeholder="Nombre(s)" required />
                <br><br>
                <input type="text" name="apellido_paterno" placeholder="Apellido paterno" required />
                <br><br>
                <input type="text" name="apellido_materno" placeholder="Apellido materno" required />
                <br><br>
                <input type="tel" name="telefono" placeholder="Teléfono" required />
                <br><br>
                <input type="date" name="fecha_de_nacimiento" required />
                <br><br>
                <input type="email" name="correo" placeholder="Email" required />
                <br><br>
                <input type="password" name="contrasena" placeholder="Contraseña" required />
                <br><br>
                <button type="submit">Registrarse</button>
            </form>

            <form method="POST"  action="./index.php">
                    <button type="submit">¿Tienes cuenta?</button>
            </form>
        </div>
</body>
</html>



   