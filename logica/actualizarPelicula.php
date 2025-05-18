<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_pelicula"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $clasificacion = $_POST["clasificacion"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];

    $stmt = $conexion->prepare("UPDATE Pelicula SET titulo = ?, descripcion = ?, clasificacion = ?, duracion = ?, genero = ? WHERE id_pelicula = ?");
    $stmt->bind_param("sssssi", $titulo, $descripcion, $clasificacion, $duracion, $genero, $id);

    if ($stmt->execute()) {
        header("Location: ../AdminEditar.php?mensaje=ok");
        exit;
    } else {
        echo "<p>Error al actualizar la película.</p>";
    }

    $stmt->close();
    $conexion->close();
}
if ($_POST["accion"] === "guardar") {
    // después de actualizar correctamente:
    header("Location: ../AdminAgregarPelicula.php?mensaje=actualizado");
} elseif ($_POST["accion"] === "eliminar") {
    // después de eliminar correctamente:
    header("Location: ../AdminAgregarPelicula.php?mensaje=eliminado");
}


?>
