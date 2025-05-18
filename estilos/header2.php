<?php
session_start();
require_once __DIR__ . '/../logica/conexion.php';

// NOTA PARA EL FUTURO: 
// ANADIR EL HEADER2 EN LAS VISTAS DE ADMIN

$nombreUsuario = null;

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    
    $sql = "SELECT nombre FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $nombreUsuario = htmlspecialchars($fila['nombre']);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vértigo Films</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
    <style>
        .gradient-custom {
            background: linear-gradient(135deg, #0066cc 0%, #003366 100%);
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }
        .btn-login {
            background-color: transparent;
            border: 1px solid white;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>

<header class="p-3 mb-3 gradient-custom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Menú izquierdo -->
            <ul class="nav col-4 col-lg-auto mb-2 justify-content-center">
                <li>
                    <a class="btn btn-primary nav-link px-2 text-white" href="./index.php">Cartelera</a>    
                </li>
                <li>
                    <a class="nav-link px-2 text-white" href="">|</a>
                </li>
                <li>
                    <a class="btn btn-primary nav-link px-2 text-white" href="">Promociones</a>
                </li>
            </ul>

            <!-- Logo central -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand px-2 text-center text-white d-block" href="#">
                    <span class="d-block h4 mb-0 fw-bold">VÉRTIGO</span>
                    <span class="d-block h5">FILMS</span>
                </a>
                <img src="./media/LOGOVERTIGO.PNG" width="70" height="70" class="ms-3">
            </div>

            <!-- Área de usuario -->
            <div class="text-end">
                <?php if ($nombreUsuario): ?>
                    <div class="d-flex align-items-center">
                        <img src="./media/user-avatar.png" class="user-avatar" alt="Avatar">
                        <span class="text-white me-3"><?= $nombreUsuario ?></span>
                        <a href="../logica/logout.php" class="btn btn-login text-white">Salir</a>
                    </div>
                <?php else: ?>
                    <a href="Login.php" class="btn btn-login text-white">Iniciar sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

</body>
</html>