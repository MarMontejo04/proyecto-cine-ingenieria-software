
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css">
    <link href="./estilos/style.css" rel="stylesheet">

</head>

<body class="fondo2 h-100" >

    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="d-flex justify-content-center">
        <h1 class="fs-4 fw-bold text-decoration-none">Cartelera</h1>
    </div>

    <div class="peliculas">
        <?php include("./logica/cartelera2.php"); ?>
    </div>

    <footer>  
        <?php include "./estilos/footer.php"; ?>
    </footer>
</body>
</html>