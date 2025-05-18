<?php
require 'conexion.php';

$pelicula_id = $_GET['pelicula_id'] ?? null;

if (!$pelicula_id) {
    echo "<p>ID de película no proporcionado.</p>";
    exit;
}

$sqlPelicula = "SELECT titulo, genero, poster_url FROM Pelicula WHERE id_pelicula = ?";
$stmt = $conexion->prepare($sqlPelicula);
$stmt->bind_param("i", $pelicula_id);
$stmt->execute();
$resultadoPelicula = $stmt->get_result();

if ($resultadoPelicula->num_rows === 0) {
    echo "<p>Película no encontrada.</p>";
    exit;
}

$pelicula = $resultadoPelicula->fetch_assoc();


$sqlFunciones = "SELECT id_funcion, dia, hora, idioma, subtitulo, tipo_funcion, id_sala 
                 FROM Funcion 
                 WHERE id_pelicula = ? AND estado = 'activa'";
$stmtFuncion = $conexion->prepare($sqlFunciones);
$stmtFuncion->bind_param("i", $pelicula_id);
$stmtFuncion->execute();
$resultadoFunciones = $stmtFuncion->get_result();
?>