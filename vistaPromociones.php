<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
    exit();
}
$correo = $_SESSION['username'];


require('logica/conexion.php');

mysqli_set_charset($conexion, 'utf8');

if (!isset($correo)) {
    header("location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css">
    <link rel="stylesheet" href="./estilos/style.css">
<style>
    .titulo-promociones {
        text-align: center;
        font-size: 3rem;
        font-weight: bold;
        margin-top: 2rem;
        margin-bottom: 2rem;
        color: #333;
    }
    
    .fondo2 {
        background-image: url("imgFondo/Fondo2.png");
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 90vh;
    }

    .promo-img {
        width: 100%;
        max-width: 250px; /* Limita el ancho máximo */
        border-radius: 10px;
        box-shadow: 0px 4px 16px rgba(0, 0, 0, 1);
        transition: transform 0.3s ease;
    }

    .promo-img:hover {
        transform: scale(1.2);
        box-shadow: 0px 4px 32px rgb(98, 0, 115);
    }

    .promo-card {
        padding: 1cm; /* Reducir el padding */
        padding-top: 0.5cm;
        padding-bottom: 0.2cm;
        text-align: center;
        display: flex;
        justify-content: center; /* Centrar la imagen horizontalmente */
    }

    .container-promos {
        padding-top: 0.5cm;
        padding-bottom: 6cm;
    }

</style>
<body class="fondo2 h-100">
    <header>
        <?php include "./estilos/header2.php"; ?>
    </header>

    <div class="container container-promos">
        <h1 class="titulo-promociones">PROMOCIONES</h1>

        <div class="row justify-content-center g-4">
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion1.png" alt="Promoción 1" class="promo-img">
            </div>
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion2.png" alt="Promoción 2" class="promo-img">
            </div>
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion3.png" alt="Promoción 3" class="promo-img">
            </div>
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion4.png" alt="Promoción 4" class="promo-img">
            </div>

            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion5.png" alt="Promoción 5" class="promo-img">
            </div>
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion6.png" alt="Promoción 6" class="promo-img">
            </div>
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion7.png" alt="Promoción 7" class="promo-img">
            </div>
            <div class="col-md-6 col-lg-3 promo-card">
                <img src="./imagenes/promocion8.png" alt="Promoción 8" class="promo-img">
            </div>
        </div>
    </div>

    <footer>
        <?php include "./estilos/footer.php"; ?>
    </footer>
</body>
</html>
