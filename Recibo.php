<?php
session_start();

$username = $_SESSION['username'] ?? 'Invitado';
$id_funcion = $_POST['id_funcion'] ?? '';
$asientos = $_POST['asientos'] ?? [];
$total = $_POST['total'] ?? 0;
$cantidad = $_POST['cantidad'] ?? 0;
$tipo_pago = $_POST['tipo'] ?? 'No especificado';
$numero_pedido = $_POST['datos']['numero_pedido'] ?? rand(1, 500);

require 'logica/conexion.php';

// Consulta para obtener los datos de la función
$sql = "
    SELECT p.titulo, p.poster_url, f.dia, f.hora, s.nombre AS sala_nombre, 
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
$resultado = $stmt->get_result();
$datos_funcion = $resultado->fetch_assoc();

$titulo = $datos_funcion['titulo'] ?? 'Película desconocida';
$imagen = $datos_funcion['poster_url'] ?? 'default.jpg';
$fecha = $datos_funcion['dia'] ?? '';
$hora = $datos_funcion['hora'] ?? '';
$sala = $datos_funcion['sala_nombre'] ?? '';
$cine = $datos_funcion['cine_nombre'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de compra</title>
    <link href="/estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="/estilos/style.css" rel="stylesheet">
</head>
<body class="fondo2">

<header>
    <?php include "./estilos/header2.php"; ?>
</header>

<div class="container mt-5 mb-5">
    <div class="card shadow-lg p-4">
        <div class="text-center">
            <h2 class="mb-4">🎟️ ¡Gracias por tu compra, <?= htmlspecialchars($username) ?>!</h2>
            <img src="<?= htmlspecialchars($imagen) ?>" alt="<?= htmlspecialchars($titulo) ?>" class="img-fluid mb-3" style="max-height: 300px;">
            <h4><?= htmlspecialchars($titulo) ?></h4>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Cine:</strong> <?= htmlspecialchars($cine) ?></p>
                <p><strong>Sala:</strong> <?= htmlspecialchars($sala) ?></p>
                <p><strong>Fecha:</strong> <?= htmlspecialchars($fecha) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($hora) ?></p>
                <p><strong>Tipo de pago:</strong> <?= htmlspecialchars($tipo_pago) ?></p>
                <p><strong>Número de pedido:</strong> <?= $numero_pedido ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Asientos seleccionados:</strong></p>
                <ul>
                    <?php foreach ($asientos as $a): ?>
                        <li>Asiento #<?= htmlspecialchars($a) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="text-center mt-4">
            <h4>Total pagado: <span class="text-success">$<?= number_format($total, 2) ?></span></h4>
            <p class="text-muted">Cantidad de boletos: <?= count($asientos) ?></p>
        </div>

        <div class="text-center mt-4">
            <a href="vistaCartelera.php" class="btn btn-primary">Volver al inicio</a>
        </div>
    </div>
</div>

<footer class="mt-5">
    <?php include "./estilos/footer.php"; ?>
</footer>

</body>
</html>