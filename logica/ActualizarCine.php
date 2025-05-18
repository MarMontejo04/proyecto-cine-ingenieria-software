<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_cine"];
    $nombre = $_POST["nombre"];
    $ubicacion = $_POST["ubicacion"];
    $gerente = $_POST["gerente"];

    $stmt = $conexion->prepare("UPDATE Cine SET nombre = ?, ubicacion = ?, gerente = ? WHERE id_cine = ?");
    if (!$stmt) {
        die("Error en prepare: " . $conexion->error);
    }

    $stmt->bind_param("sssi", $nombre, $ubicacion, $gerente, $id);

    if ($stmt->execute()) {
        header("Location: ../AdminEditarCine.php?mensaje=ok");
        exit;
    } else {
        echo "<p>Error al actualizar la película.</p>";
    }

    $stmt->close();
    $conexion->close();
}
?>
