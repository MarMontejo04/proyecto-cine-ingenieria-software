<?php
require('conexion.php');
session_start();

$email = $_POST['correo']; 
$clave = $_POST['contraseña']; 

// Consulta para obtener la contraseña y el rol del usuario
$q = "SELECT contraseña, tipo_usuario FROM Usuarios WHERE correo = ?";
$stmt = mysqli_prepare($conexion, $q);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if ($resultado && mysqli_num_rows($resultado) === 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $hashGuardado = $fila['contraseña'];
    $rol = $fila['tipo_usuario'];

    if (password_verify($clave, $hashGuardado)) {
        $_SESSION['username'] = $email;

        if (isset($_SESSION['redirigir_a'])) {
            $destino = $_SESSION['redirigir_a'];
            unset($_SESSION['redirigir_a']);
            header("Location: $destino");
        } else {
            if ($rol === 'administrador') {
                header("Location: ../Admin.php");
            } else {
                header("Location: ../vistaCartelera.php");
            }
        }
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
