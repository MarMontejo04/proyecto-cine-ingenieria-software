<?php
require 'conexion.php';
if (!isset($_SESSION['username'])) {
    
    $_SESSION['redirigir_a'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php"); 
    exit;
}


$id_funcion = $_GET['id_funcion'];


$sql_sala = "SELECT id_sala FROM Funcion WHERE id_funcion = ?";
$stmt = $conexion->prepare($sql_sala);
$stmt->bind_param("i", $id_funcion);
$stmt->execute();
$res = $stmt->get_result();
$id_sala = $res->fetch_assoc()['id_sala'];

$sql = "
SELECT a.id_asiento, a.fila, a.numero,
  EXISTS (
    SELECT 1 FROM VentaAsiento va
    JOIN VentaBoleto vb ON va.id_venta = vb.id_venta
    WHERE va.id_asiento = a.id_asiento AND vb.id_funcion = ?
  ) AS vendido,
  EXISTS (
    SELECT 1 FROM ReservaAsiento ra
    JOIN Reserva r ON ra.id_reserva = r.id_reserva
    WHERE ra.id_asiento = a.id_asiento AND r.id_funcion = ? AND ra.bloqueado = TRUE AND r.estado = 'activa'
  ) AS reservado
FROM Asiento a
WHERE a.id_sala = ?
ORDER BY a.fila, a.numero
";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("iii", $id_funcion, $id_funcion, $id_sala);
$stmt->execute();
$result = $stmt->get_result();

$asientos = [];
while ($row = $result->fetch_assoc()) {
    $asientos[$row['fila']][] = $row;
}

$conexion->close();

?>
