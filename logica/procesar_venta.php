<?php
include 'conexion.php';

if (
    !isset($_POST['id_usuario'], $_POST['id_funcion'], $_POST['tipo'], $_POST['datos'], $_POST['asientos']) ||
    !is_array($_POST['asientos'])
) {
    die("Faltan datos obligatorios para procesar la venta.");
}

$id_usuario = $_POST['id_usuario'];
$id_funcion = $_POST['id_funcion'];
$tipo = $_POST['tipo'];
$datos = $_POST['datos'];
$asientos = $_POST['asientos'];
$cantidad = count($asientos);
$total = isset($_POST['total']) ? floatval($_POST['total']) : $cantidad * 80.00;
$fecha = date('Y-m-d H:i:s');


$sql_pago = "INSERT INTO MetodoPago (id_usuario, tipo, datos) VALUES (?, ?, ?)";
$stmt_pago = $conn->prepare($sql_pago);
$stmt_pago->bind_param("iss", $id_usuario, $tipo, $datos);
$stmt_pago->execute();
$id_pago = $stmt_pago->insert_id;


$sql_venta = "INSERT INTO VentaBoleto (id_usuario, id_funcion, id_Pago, cantidad, precio, fecha_compra)
              VALUES (?, ?, ?, ?, ?, ?)";
$stmt_venta = $conn->prepare($sql_venta);
$stmt_venta->bind_param("iiiids", $id_usuario, $id_funcion, $id_pago, $cantidad, $total, $fecha);
$stmt_venta->execute();
$id_venta = $stmt_venta->insert_id;


$sql_asiento = "INSERT INTO VentaAsiento (id_venta, id_asiento) VALUES (?, ?)";
$stmt_asiento = $conn->prepare($sql_asiento);
foreach ($asientos as $id_asiento) {
    $stmt_asiento->bind_param("ii", $id_venta, $id_asiento);
    $stmt_asiento->execute();
}


$conn->close();
header("Location: confirmacion.php?id_venta=$id_venta");
exit;
