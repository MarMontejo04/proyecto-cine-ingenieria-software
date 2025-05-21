<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link type="text/css" rel="stylesheet" href="../estilos/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../estilos/style.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="media/favicon.png" type="image/x-icon">
</head>
<body>

<div class="navbar-fixed ">
        <nav class="fondopastel z-depth-2" role="navigation">
            <div class="nav-wrapper container "><a id="logo-container" href="https://www.aragon.unam.mx/fes-aragon/#!/inicio" class="brand-logo black-text ">FES ARAGÓN</a>
                <ul class="right hide-on-med-and-down " >
                    <li><a class="black-text text-darken-2" href='../Registro.php'><i class="material-icons left">border_color</i>REGISTRAR NUEVO USUARIO</a></li>
                    <li><a class="black-text text-darken-2" href='../Principal.php'><i class="material-icons left">assignment</i>VER REGISTROS</a></li>
                    <li><a class="black-text text-darken-2" href='./salir.php'><i class="material-icons left">exit_to_app</i>SALIR</a></li>
            </div>
        </nav>
    </div>
    
<?php
include "./conexion.php";
mysqli_set_charset($conexion,'utf8');
$nombreUser=$_POST['nombre'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$buscarusuario="SELECT * FROM usuarios WHERE nombre='$nombreUser'";

$resultado = $conexion -> query($buscarusuario);
$count =mysqli_num_rows($resultado);
if($count==1){
    echo"<br><h1 class='center-align'>El usuario ya esta registrado</h1>";

}else{

    mysqli_query($conexion,"INSERT INTO usuarios(
        nombre, apellido, correo, contraseña, telefono, fecha_nacimiento, direccion)
        VALUES(
            '$_POST[nombre]',
            '$_POST[apellido]',
            '$_POST[correo]',
            '$_POST[contraseña]',
            '$_POST[telefono]',
            '$_POST[fecha_nacimiento]',
            '$_POST[direccion]'
        )");
        echo "<br> <h1 class='center-align'>Usuario creado con exito</h1>";
}

?>

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