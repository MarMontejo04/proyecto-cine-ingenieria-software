<?php

//Hosting
//$host_db = "sql205.infinityfree.com";
//$user_db = "if0_37329534";
//$pass_db = "tGF5kE8O37xE";
//$db_name = "if0_37329534_carrito";

//Local
$host_db = "localhost";
$user_db = "root";
$pass_db = "Oswal2018";
$db_name = "cine_VertigoDB";

//Servidor
//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "123456789";
//$db_name = "carrito";


$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

if($conexion->connect_error){
    echo"<h1>MySQL no le  esta dando permisos para ejecutar consultas verificar error</h1>";
}

?>