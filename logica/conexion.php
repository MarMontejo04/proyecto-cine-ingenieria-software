<?php

//local Alan
<<<<<<< HEAD
$host_db = "localhost:3306";
$user_db = "root";
$pass_db = "ImpliedFiber356@";
$db_name = "cine_VertigoDB";

=======
//$host_db = "localhost:3306";
//$user_db = "root";
//$pass_db = "ImpliedFiber356@";
//$db_name = "cine_VertigoDB";
>>>>>>> 44b259274a2d349c40896be1d232d061e58825a1
//local AlN
//$host_db = "localhost:3306";
//$user_db = "root";
//$pass_db = "ImpliedFiber356@";
//$db_name = "cine_VertigoDB";

//Hosting
$host_db = "localhost";
$user_db = "root";
$pass_db = "halo";
$db_name = "cine_VertigoDB";

//Servidor
//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "123456789";
//$db_name = "carrito";
<<<<<<< HEAD

// $host_db = "localhost";
// $user_db = "root";
// $pass_db = "halo";
// $db_name = "pagina_cine";
=======
/*
$host_db = "localhost";
$user_db = "root";
$pass_db = "halo";
$db_name = "pagina_cine";
*/
>>>>>>> 44b259274a2d349c40896be1d232d061e58825a1


$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

if($conexion->connect_error){
    echo"<h1>MySQL no le  esta dando permisos para ejecutar consultas verificar error</h1>";
}

?>