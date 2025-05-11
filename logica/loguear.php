<?php
require 'conexion.php';
session_start();

$email = $_POST['correo']; 
$clave = $_POST['contrasena']; 

$q = "SELECT contrasena FROM Usuarios WHERE correo = '$email'";
$resultado = mysqli_query($conexion, $q);

if ($resultado && mysqli_num_rows($resultado) === 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $hashGuardado = $fila['contrasena'];

    if (password_verify($clave, $hashGuardado)) {
        $_SESSION['username'] = $email; 
        header("Location: ../vistaCartelera.php");
        exit;
    } else {
        header("Location: ../indexError.php");
        exit;
    }
} else {
    header("Location: ../indexError.php");
    exit;
}
?>
