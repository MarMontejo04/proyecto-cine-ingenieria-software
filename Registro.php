<?php
    session_start();
    $email= $_SESSION['username'];

    if(!isset($email)){
            header("location: ./index.php");
            exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<header>
    <?php include "./estilos/header.php"; ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link type="text/css" rel="stylesheet" href="./estilos/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="./estilos/style.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="media/favicon.png" type="image/x-icon">
</head>
<body>

    <div class="navbar-fixed ">
        <nav class="fondopastel z-depth-2" role="navigation">
            <div class="nav-wrapper container "><a id="logo-container" href="https://www.aragon.unam.mx/fes-aragon/#!/inicio" class="brand-logo black-text ">FES ARAGÓN</a>
                <ul class="right hide-on-med-and-down " >
                    <li><a class="black-text text-darken-2" href='./Principal.php'><i class="material-icons left">assignment</i>VER REGISTROS</a></li>
                    <li><a class="black-text text-darken-2" href='./logica/salir.php'><i class="material-icons left">exit_to_app</i>SALIR</a></li>
            </div>
        </nav>
    </div>

    <header class="container espacio center-align" >
        <h3>Registro</h3>
    </header>
    
    <div class="container espacio">
        <div class="row">
            <form class="col s12" action="./logica/enviarRegistro.php" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="nombre" maxlength="30" class="validate" required>
                        <label for="nombre">Nombre(s):</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="apellido" maxlength="50" class="validate" required>
                        <label for="apellido">Apellidos:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="correo" maxlength="50" class="validate" required>
                        <label for="correo">Correo:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="date" name="fecha_nacimiento" class="validate" required>
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">                        
                        <input type="text" name="direccion" maxlength="120" class="validate" required>
                        <label for="direccion">Dirección Particular:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">                    
                        <input type="text" name="telefono" maxlength="10" class="validate" required>
                        <label for="telefono">Teléfono:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="contraseña" maxlength="20" class="validate" required>
                        <label for="contraseña">Contraseña:</label>
                    </div>
                </div>
                <button class= "btn waves-effect waves-light blue lighten-5 black-text" type="submit">Enviar registro<i class="material-icons right">send</i></button>
            </form>
        </div>
    </div>
    <footer class="page-footer fondopastel">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="black-text">Proyecto Final</h5>
          <p class="grey-text">Chipi-chipi, chapa-chapa Dubi-dubi, daba-daba Mágico mi dubi-dubi boom, boom, boom, boom Chipi-chipi, chapa-chapa Dubi-dubi, daba-daba Mágico mi dubi-dubi boom</p>
        </div>
        <div class="col l3 s12">
          <h5 class="black-text">Redes Sociales</h5>
          <ul>
            <li><a class="black-text" href="https://github.com/MarMontejo04">GitHub</a></li>
            <li><a class="black-text" href="https://www.facebook.com/?locale=es_LA">Facebook</a></li>
            <li><a class="black-text" href="https://www.instagram.com/">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
</body>
</html>