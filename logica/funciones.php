<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_funcion = $_POST["id_funcion"];
    $id_pelicula = $_POST["id_pelicula"];
    $dia = $_POST["dia"];
    $idioma = $_POST["idioma"];
    $subtitulo = $_POST["subtitulo"];
    $tipo_funcion = $_POST["tipo_funcion"];
    $estado = $_POST["estado"];

    // Actualiza correctamente la película asignada a la función
    $stmt = $conexion->prepare("UPDATE Funcion SET id_pelicula = ?, dia = ?, idioma = ?, subtitulo = ?, tipo_funcion = ?, estado = ? WHERE id_funcion = ?");
    $stmt->bind_param("ississi", $id_pelicula, $dia, $idioma, $subtitulo, $tipo_funcion, $estado, $id_funcion);

    if ($stmt->execute()) {
        header("Location: ../Vistas/VistasAdmin/Funciones.php?mensaje=ok");
        exit;
    } else {
        echo "<p>Error al actualizar la función: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conexion->close();
}
?>
