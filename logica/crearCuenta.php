<?php
require 'conexion.php';

$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_de_nacimiento'];
$tipo_usuario = 'cliente'; 

$contraseña = '123456'; 

$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

$sql = "INSERT INTO Usuarios (
            nombre,
            apellido_paterno,
            apellido_materno,
            correo,
            telefono,
            fecha_de_nacimiento,
            contraseña,
            tipo_usuario
        ) VALUES (
            '$nombre',
            '$apellido_paterno',
            '$apellido_materno',
            '$correo',
            '$telefono',
            '$fecha_nacimiento',
            '$contraseña',
            '$tipo_usuario'
        )";

if ($conexion->query($sql) === TRUE) {
    header("Location: ../conSesionActiva/vistaCartelera.php");
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>

<!-- cambie a contraseña -->