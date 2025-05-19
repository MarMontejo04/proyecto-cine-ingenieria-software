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

        .promo-img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .promo-img:hover {
            transform: scale(1.05);
        }

        .promo-card {
            padding: 1rem;
            text-align: center;
        }

        .container-promos {
            padding: 2rem;
        }
    </style>
</head>
<body>
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
        </div>
    </div>

    <footer>
        <?php include "./estilos/footer.php"; ?>
    </footer>
</body>
</html>
