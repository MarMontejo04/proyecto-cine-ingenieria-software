<?php
session_start();
include 'conexion.php';


$nombreUsuario = null;

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT nombre FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $nombreUsuario = $fila['nombre'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Header2</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
</head>
<body>

<header class="p-3 mb-3 gradient-custom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
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

            <a class="navbar-brand px-2 text-center text-white d-block" href="#">
                <span class="d-block h4 mb-0 fw-bold">VÉRTIGO</span>
                <span class="d-block h5">FILMS</span>
            </a>

            <img src="./media/LOGOVERTIGO.PNG" width="70" height="70" class="ms-3">

            <select id="opcionesCine" name="opcionesCine" class="form-select border-1 shadow-sm ms-3 me-3">
                <option value="opcion1">Cine 1</option>
                <option value="opcion2">Cine 2</option>
                <option value="opcion3">Cine 3</option>
            </select>

            <?php if ($nombreUsuario): ?>
                <span class="text-white me-3">Hola, <?php echo htmlspecialchars($nombreUsuario); ?></span>
                <a href="../Login" class="btn btn-outline-light">Cerrar sesión</a>
            <?php else: ?>
                <a href="Login.php" class="btn btn-outline-light">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </div>
</header>

</body>
</html>
