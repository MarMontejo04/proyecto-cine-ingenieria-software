<?php
require 'conexion.php';
session_start();

$no_cuenta = $_POST['no_cuenta'];
$clave = $_POST['clave'];


//La función COUNT devuelve el número de filas de la consulta, es decir, el número de registros que cumplen una determinada condición.

//Los valores nulos no serán contabilizados
$q = "SELECT COUNT(*) as contar from persona where no_cuenta= '$no_cuenta' and password = '$clave'";

$consulta = mysqli_query($conexion, $q);

$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {

    // en la variable session se guarda el numero de cuenta esto para poder acarrearla
    $_SESSION['usermane'] = $no_cuenta;

    header("location: ../Principal.php");
} else {

    header("location: ../indexError.php");
}
?>