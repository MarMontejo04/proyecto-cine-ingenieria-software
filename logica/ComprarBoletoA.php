<?php
require 'conexion.php';

$id_funcion = isset($_GET['id_funcion']) ? intval($_GET['id_funcion']) : 0;

if ($id_funcion <= 0) {
    die("ID de función no válido.");
}

$sql = "
    SELECT f.id_funcion, f.dia, f.hora, f.idioma, f.subtitulo, f.tipo_funcion,
           p.titulo, p.genero, p.descripcion, p.clasificacion, p.poster_url,
           s.nombre AS sala_nombre,
           c.nombre AS cine_nombre
    FROM Funcion f
    INNER JOIN Pelicula p ON f.id_pelicula = p.id_pelicula
    INNER JOIN Sala s ON f.id_sala = s.id_sala
    INNER JOIN Cine c ON s.id_cine = c.id_cine
    WHERE f.id_funcion = ?
";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_funcion);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Función no encontrada.");
}

$funcion = $result->fetch_assoc();
?>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <img src="<?= htmlspecialchars($funcion['poster_url']) ?>" alt="Poster" class="img-fluid rounded">
        </div>
        <div class="col-md-8">
            <h2 class="mb-3"><?= htmlspecialchars($funcion['titulo']) ?></h2>
            <p><strong>Género:</strong> <?= htmlspecialchars($funcion['genero']) ?></p>
            <p><strong>Clasificación:</strong> <?= htmlspecialchars($funcion['clasificacion']) ?></p>
            <p><strong>Cine:</strong> <?= htmlspecialchars($funcion['cine_nombre']) ?></p>
            <p><strong>Sala:</strong> <?= htmlspecialchars($funcion['sala_nombre']) ?></p>
            <p><strong>Idioma:</strong> <?= htmlspecialchars($funcion['idioma']) ?> <?= $funcion['subtitulo'] ? '(Subtitulada)' : '(Sin subtítulos)' ?></p>
            <p><strong>Tipo:</strong> <?= htmlspecialchars($funcion['tipo_funcion']) ?></p>
            <p class="info-text"><strong>Descripción:</strong> <?= htmlspecialchars($funcion['descripcion']) ?></p>
            <p><strong>Horario:</strong></p>
            <div class="horario-box"><?= htmlspecialchars($funcion['dia']) ?> - <?= htmlspecialchars($funcion['hora']) ?></div>

            <form action="./Asientos.php" method="GET" class="mt-4">
                <input type="hidden" name="id_funcion" value="<?= $funcion['id_funcion'] ?>">
                <button type="submit" class="btn gradient-custom text-white p-3">Continuar con la compra</button>
            </form>
        </div>
    </div>
</div>

<?php $conexion->close(); ?>
