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

    $stmt->bind_param("sssiss", $titulo, $descripcion, $clasificacion, $duracion, $genero, $poster_url);

    if ($stmt->execute()) {
        header("Location: ../Admin.php?mensaje=ok");
        exit;
    } else {
        echo "<p>Error al agregar la película.</p>";
    }

    $stmt->close();
    $conexion->close();
}
?>