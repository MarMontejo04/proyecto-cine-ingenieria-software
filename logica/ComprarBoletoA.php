<?php
require 'conexion.php';

$pelicula_id = $_GET['pelicula_id'] ?? null;

if (!$pelicula_id) {
    die("ID de película no proporcionado.");
}

$sqlPelicula = "SELECT titulo, genero, descripcion, clasificacion, poster_url FROM Pelicula WHERE id_pelicula = ?";
$stmt = $conexion->prepare($sqlPelicula);
$stmt->bind_param("i", $pelicula_id);
$stmt->execute();
$peliculaResult = $stmt->get_result();

if ($peliculaResult->num_rows === 0) {
    die("Película no encontrada.");
}

$pelicula = $peliculaResult->fetch_assoc();

// Obtener funciones
$sqlFunciones = "SELECT id_funcion, dia, hora, idioma, subtitulo, tipo_funcion, id_sala 
                 FROM Funcion 
                 WHERE id_pelicula = ? AND estado = 'activa'";
$stmtFunciones = $conexion->prepare($sqlFunciones);
$stmtFunciones->bind_param("i", $pelicula_id);
$stmtFunciones->execute();
$funcionesResult = $stmtFunciones->get_result();

$funciones = [];
$fechas = [];
$idiomas = [];
$tipos = [];

while ($row = $funcionesResult->fetch_assoc()) {
    $funciones[] = $row;
    if (!in_array($row['dia'], $fechas)) $fechas[] = $row['dia'];
    if (!in_array($row['idioma'], $idiomas)) $idiomas[] = $row['idioma'];
    if (!in_array($row['tipo_funcion'], $tipos)) $tipos[] = $row['tipo_funcion'];
}

?>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-4">
            <img src="<?= htmlspecialchars($pelicula["poster_url"]) ?>" alt="Poster" class="img-fluid rounded">
        </div>
        <div class="col-md-7 ms-3">
            <h2><?= htmlspecialchars($pelicula["titulo"]) ?></h2>
            <p><strong>Género:</strong> <?= htmlspecialchars($pelicula["genero"]) ?></p>
            <p><strong>Clasificación:</strong> <?= htmlspecialchars($pelicula["clasificacion"]) ?></p>
            <p style="text-align: justify;"><strong>Descripción:</strong> <?= htmlspecialchars($pelicula["descripcion"]) ?></p>
        </div>
    </div>
</div>
