<?php
session_start();
$no_cuenta= $_SESSION['usermane'];//413112576


if(!isset($no_cuenta)){

        header("location: index.php");
}else{
    
    echo "<h1> hola tu numero de cuenta es $no_cuenta </h1> ";
    echo "<a href='logica/salir.php'> SALIR</a>";

}


?>