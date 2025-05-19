<?php
include 'conexion.php';

$id_usuario = $_POST['id_usuario'];
$id_funcion = $_POST['id_funcion'];
$asientos = explode(',', $_POST['asientos']);

// Simular método de pago
$id_pago = 1;  // ← en tu sistema real debería seleccionarse en paso anterior

$cantidad = count($asientos);
$precio_unitario = 80.00; // Por ejemplo
$total = $cantidad * $precio_unitario;
$fecha = date('Y-m-d H:i:s');

// Registrar venta
$sql = "INSERT INTO VentaBoleto (id_usuario, id_funcion, id_Pago, cantidad, precio, fecha_compra)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiids", $id_usuario, $id_funcion, $id_pago, $cantidad, $total, $fecha);
$stmt->execute();
$id_venta = $stmt->insert_id;

// Guardar asientos
$sql = "INSERT INTO VentaAsiento (id_venta, id_asiento) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
foreach ($asientos as $id_asiento) {
    $stmt->bind_param("ii", $id_venta, $id_asiento);
    $stmt->execute();
}

$conn->close();
header("Location: confirmacion.php?id_venta=$id_venta");
exit;
