<?php

//Hosting
//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "Oswal2018";
//$db_name = "cine_VertigoDB";

//Local
//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "Oswal2018";
//$db_name = "cine_VertigoDB";

//Servidor
//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "123456789";
//$db_name = "carrito";

//$host_db = "localhost";
//$user_db = "root";
//$pass_db = "halo";
//$db_name = "pagina_cine";


$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

if($conexion->connect_error){
    echo"<h1>MySQL no le  esta dando permisos para ejecutar consultas verificar error</h1>";
}

?>