<?php
require "conexion.php";

mysqli_set_charset($conexion,'utf8');
$registroEliminado =$_POST['correo'];
$consulta="DELETE FROM usuarios WHERE correo = '$registroEliminado'";

mysqli_query($conexion, $consulta);
mysqli_close($conexion);
header('Location: ../EliminarUsuario.php');
?>