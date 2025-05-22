<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminEditarCine</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/estiloAgregar.css">
</head>
<body>
    <header>
        <?php include "./estilos/headerAdmin.php"; ?>
    </header>

    <div class="container-fluid mt-4">
        <div class="text-center mb-4">
            <h1>Administrador de Cines</h1>
            <div class="d-flex justify-content-center gap-3">
                <form method="GET" action="./Admin.php">
                    <button type="submit" class="btn btn-primary">Agregar Películas</button>
                </form>
                <form method="GET" action="./AdminEditar.php">
                    <button type="submit" class="btn btn-secondary">Editar Películas</button>
                </form>
                <form method="GET" action="./Vistas/VistasAdmin/Funciones.php">
                    <button type="submit" class="btn btn-secondary">Editar Funciones</button>
                </form>
                <form method="GET" action=".\Vistas\VistasAdmin\AdminSalas.php">
                <button type="submit" class="btn btn-secondary">Editar Salas</button>
            </form>
            </div>
        </div>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'ok'): ?>
            <div class="alert alert-success" role="alert">
                ¡Cine actualizado correctamente!
            </div>
        <?php endif; ?>

        <h2 class="mb-4">Lista de Cines</h2>

        <?php
        require "./logica/conexion.php";

        $sql = "SELECT id_cine, nombre, ubicacion, gerente FROM Cine";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<div class="table-responsive" style="min-width: 1000px;">';
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Ubicación</th>';
            echo '<th>Gerente</th>';
            echo '<th>Acción</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($fila = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<form method="POST" action="logica/ActualizarCine.php">';
                echo '<input type="hidden" name="id_cine" value="' . $fila["id_cine"] . '">';
                echo '<td><input class="form-control" type="text" name="nombre" value="' . htmlspecialchars($fila["nombre"]) . '"></td>';
                echo '<td><input class="form-control" type="text" name="ubicacion" value="' . htmlspecialchars($fila["ubicacion"]) . '"></td>';
                echo '<td><input class="form-control" type="text" name="gerente" value="' . htmlspecialchars($fila["gerente"]) . '"></td>';
                echo '<td><button type="submit" class="btn btn-success">Guardar</button></td>';
                echo '</form>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo "<p>No hay cines registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>

    <script src="estilos/js/bootstrap.bundle.min.js"></script>
</body>
</html>
