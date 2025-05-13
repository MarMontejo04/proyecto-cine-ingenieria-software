<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $clasificacion = $_POST['clasificacion'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $poster_url = $_POST['poster_url'];

    $stmt = $conexion->prepare("INSERT INTO Pelicula (titulo, descripcion, clasificacion, duracion, genero, poster_url) 
                            VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssiss", $titulo, $descripcion, $clasificacion, $duracion, $genero, $poster_url);
        if ($stmt->execute()) {
            header("Location: Admin.php?agregado=1");
            exit;
        } else {
            $error = "❌ Error al ejecutar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "❌ Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();
}
?>