<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminSalas</title>
    <link href="../../estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../estilos/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estiloAgregar.css">
</head>
<body>
    <header>
        <?php include "../../estilos/headerAdmin.php"; ?>
    </header>

    <div class="ECE text-center my-4">
        <h1>Editar Salas</h1>
        <div class="d-flex justify-content-center gap-3 mb-4">
            <form method="POST" action="../../AdminEditar.php">
                <button type="submit" class="btn btn-primary">Editar Películas</button>
            </form>
            <form method="GET" action="../../Admin.php">
                <button type="submit" class="btn btn-secondary">Agregar Película</button>
            </form>
            <form method="GET" action="../../AdminEditarCine.php">
                <button type="submit" class="btn btn-secondary">Editar Cine</button>
            </form>
            <form method="GET" action="./Funciones.php">
                <button type="submit" class="btn btn-secondary">Editar Funciones</button>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'ok'): ?>
            <div class="alert alert-success" role="alert">
                ¡Sala actualizada correctamente!
            </div>
        <?php endif; ?>

        <h2 class="mb-4">Lista de Salas</h2>

        <?php
        require "../../logica/conexion.php";

        $sql = "SELECT s.id_sala, s.nombre AS nombre_sala, s.capacidad, s.tipo, c.nombre AS nombre_cine
                FROM Sala s
                INNER JOIN Cine c ON s.id_cine = c.id_cine
                ORDER BY s.id_sala ASC";

        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>Cine</th>';
            echo '<th>Nombre Sala</th>';
            echo '<th>Capacidad</th>';
            echo '<th>Tipo</th>';
            echo '<th>Acción</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($fila = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<form method="POST" action="../../logica/salas.php">';
                echo '<input type="hidden" name="id_sala" value="' . $fila["id_sala"] . '">';
                echo '<td>' . htmlspecialchars($fila["nombre_cine"]) . '</td>';
                echo '<td><input class="form-control" type="text" name="nombre" value="' . htmlspecialchars($fila["nombre_sala"]) . '"></td>';
                echo '<td>' . htmlspecialchars($fila["capacidad"]) . '</td>';
                echo '<td><select class="form-control" name="tipo">';
                    $tipos = ['tradicional', 'VIP'];
                    foreach ($tipos as $tipo) {
                        $selected = ($tipo == $fila["tipo"]) ? 'selected' : '';
                        echo '<option value="' . $tipo . '" ' . $selected . '>' . $tipo . '</option>';
                    }
                echo '</select></td>';
                echo '<td><button type="submit" class="btn btn-success">Guardar</button></td>';
                echo '</form>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo "<p>No hay salas registradas.</p>";
        }

        $conexion->close();
        ?>
    </div>

    <script src="../../estilos/js/bootstrap.bundle.min.js"></script>
</body>
</html>