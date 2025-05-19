<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    // Guardamos temporalmente los datos del formulario para después
    $_SESSION['redirigir_a'] = $_SERVER['REQUEST_URI'];
    $_SESSION['datos_temporales'] = $_POST; // Opcional, si necesitas guardar info

    header("Location: login.php");
    exit;
}
?>