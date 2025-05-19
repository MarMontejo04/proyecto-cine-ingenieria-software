<?php
require 'conexion.php';

$id_pelicula = isset($_GET['id_pelicula']) ? intval($_GET['id_pelicula']) : 0;
$id_cine = isset($_GET['id_cine']) ? intval($_GET['id_cine']) : 0;

if ($id_pelicula === 0) {
    echo "Datos inválidos.";
    exit;
}

$sql = "
    SELECT f.id_funcion, f.dia, f.hora, s.nombre AS sala_nombre, c.nombre AS cine_nombre
    FROM Funcion f
    INNER JOIN Sala s ON f.id_sala = s.id_sala
    INNER JOIN Cine c ON s.id_cine = c.id_cine
    WHERE f.id_pelicula = $id_pelicula" . ($id_cine > 0 ? " AND s.id_cine = $id_cine" : "") . "
    ORDER BY f.dia, f.hora
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo '<ul class="list-group">';
        while ($fila = $resultado->fetch_assoc()) {
            echo '<li class="list-group-item">';
            echo '<strong>Cine:</strong> ' . htmlspecialchars($fila['cine_nombre']) . '<br>';
            echo '<strong>Sala:</strong> ' . htmlspecialchars($fila['sala_nombre']) . '<br>';
            echo '<strong>Día:</strong> ' . htmlspecialchars($fila['dia']) . '<br>';
            echo '<strong>Hora:</strong> ' . htmlspecialchars($fila['hora']) . '<br>';
            echo '<a href="./ComprarBoletoA.php?id_funcion=' . $fila['id_funcion'] . '" class="btn btn-sm btn-primary">Seleccionar</a>';
            echo '</li>';
        }

    echo '</ul>';
} else {
    echo "No hay funciones disponibles para esta película.";
}

$conexion->close();
?>
