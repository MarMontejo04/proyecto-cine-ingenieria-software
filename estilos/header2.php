
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vértigo Films</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
</head>
<body>

<header class="p-3 mb-3 gradient-custom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            
            <ul class="nav col-4 col-lg-auto mb-2 justify-content-center">
                <li>
                    <a class="btn btn-login text-white px-2 text-white" href="./index.php">Cartelera</a>    
                </li>
                <li>
                    <h1 class="nav-link px-2 text-white">|</h1>
                </li>
                <li>
                    <a class="btn btn-login text-white px-2 text-white" href="vistaPromociones.php">Promociones</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a class="navbar-brand px-2 text-center text-white d-block" href="#">
                    <span class="d-block h4 mb-0 fw-bold">VÉRTIGO</span>
                    <span class="d-block h5">FILMS</span>
                </a>
                <img src="./media/LOGOVERTIGO.PNG" width="70" height="70" class="ms-3">
            </div>

            <div class="text-end">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="d-flex align-items-center">
                        <img src="./media/perfil.png" class="user-avatar me-2" alt="Avatar" width="30" height="30">
                        <span class="text-white me-3"><?= htmlspecialchars($_SESSION['username']) ?></span>
                        <a href="./logica/salir.php" class="btn btn-login text-white">Salir</a>
                    </div>
                <?php else: ?>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

</body>
</html>
