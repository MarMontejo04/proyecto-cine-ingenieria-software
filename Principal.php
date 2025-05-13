<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link type="text/css" rel="stylesheet" href="./estilos/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="./estilos/style.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="./media/favicon.png" type="image/x-icon">
</head>

<header>
    <?php include "./estilos/header.php"; ?>
</header>

<body>
    <div class="navbar-fixed ">
        <nav class="fondopastel z-depth-2" role="navigation">
            <div class="nav-wrapper container "><a id="logo-container" href="https://www.aragon.unam.mx/fes-aragon/#!/inicio" class="brand-logo black-text ">FES ARAGÓN</a>
                <ul class="right hide-on-med-and-down " >
                    <li><a class="black-text text-darken-2" href='./Registro.php'><i class="material-icons left">border_color</i>REGISTRAR USUARIO</a></li>
                    <li><a class="black-text text-darken-2" href='./EliminarUsuario.php'><i class="material-icons left">delete</i>ELIMINAR USUARIO</a></li>
                    <li><a class="black-text text-darken-2" href='./logica/salir.php'><i class="material-icons left">exit_to_app</i>SALIR</a></li>
            </div>
        </nav>
    </div>

<?php
session_start();
$email= $_SESSION['username'];

if(!isset($email)){
        header("location: ./index.php");
        exit();
}else{
    require "./logica/conexion.php";
    mysqli_set_charset($conexion,'utf8');

    $consulta_usuario = "SELECT nombre, apellido FROM usuarios WHERE correo = '$email'";

    $resultado_usuario = $conexion->query($consulta_usuario);

    if ($resultado_usuario->num_rows > 0) {
      
        $usuario = $resultado_usuario->fetch_assoc();
        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellido'];
        
        echo "
            <div class='container'>
            <h3 class='center-align'>Bienvenido, $nombre $apellido</h3>
            <div class='divider espacio'></div>";
    }else {
        echo "<h1>Error: Usuario no encontrado.</h1>";
    }

    $consulta_sql="SELECT * FROM usuarios";

    $resultado = $conexion->query($consulta_sql);

    $count = mysqli_num_rows($resultado); 
    
    echo "<table class='highlight espacio'>
        <thead >
            <tr >
                <th>Usuario</th>
                <th>Correo Electrónico</th>
                <th>Contraseña</th>
                <th>Teléfono</th>
                <th>Fecha de Registro</th>
                <th>Fecha de Nacimiento</th>
                <th>Dirección</th>
        </thead>        
            </tr>";

    if ( $count>0 ){
        while( $row = mysqli_fetch_assoc($resultado)  ){
        echo "<tbody>";    
            echo "<tr>";
                echo"<td class='left-align'>". $row['nombre']." ".$row['apellido'] ."</td>";
                echo"<td class='center-align'>". $row['correo'] ."</td>";
                echo"<td class='center-align'>". $row['contrasena'] ."</td>";
                echo"<td class='center-align'>". $row['telefono'] ."</td>";
                echo"<td class='center-align'>". $row['fecha_creacion_user'] ."</td>";
                echo"<td class='center-align'>". $row['fecha_nacimiento'] ."</td>";
                echo"<td class='center-align'>". $row['direccion'] ."</td>";
            echo "</tr>";
        echo"</tbody>";
        }
    }else{
        echo " <h1 class='container' style='color:red'>Sin Ningun registro</h1>";
    } 
    echo "</table>";
    echo "</div>";
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