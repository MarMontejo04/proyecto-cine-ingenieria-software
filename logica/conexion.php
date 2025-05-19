<?php

//Servidor Infinityfree
// $host_db = "sql105.infinityfree.com";
// $user_db = "if0_38942601";
// $pass_db = "gJSmyqHL5Y0";
// $db_name = "if0_38942601_cine_VertigoDB";


//Local Mariana
$host_db = "localhost:3306";
$user_db = "root";
$pass_db = "Surycata04#";
$db_name = "cine_VertigoDB";


//LOCAL (SOLO COMPUTADORA DE ALAN (NO LAS BORREN xd))

//$host_db = "localhost:3306";
//$user_db = "root";
//$pass_db = "ImpliedFiber356@";
//$db_name = "cine_VertigoDB";


//Hosting
 //$host_db = "localhost";
 //$user_db = "root";
 //$pass_db = "halo";
 //$db_name = "cine_VertigoDB";

//Servidor
//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "123456789";
//$db_name = "carrito";

//camara culeros se la pasan borrando la mia
 //$host_db = "localhost";
 //$user_db = "root";
 //$pass_db = "Oswal2018";
 //$db_name = "cine_VertigoDB";

// $host_db = "localhost";
// $user_db = "root";
// $pass_db = "halo";
// $db_name = "pagina_cine";


$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

if($conexion->connect_error){
    echo"<h1>MySQL no le  esta dando permisos para ejecutar consultas verificar error</h1>";
}

?>