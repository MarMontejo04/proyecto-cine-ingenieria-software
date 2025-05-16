<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminEditarCine</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css">
    <link rel="stylesheet" href="./estilos/estiloAgregar.css">
</head>
<body>
    <header>
        <div class="header"></div>
        <h1>Logotipo</h1>
        <div class="botones">
            <button>Tu cine</button>
            <form method="POST" action="./index.php">
                <button type="submit">Login</button>
            </form>
        </div>
    </header>

    <!-- Aquí se eliminó el botón Agregar -->

    <div class="ECE">
        <form method="POST" action="./index.php">
            <button type="submit">Eliminar</button>
        </form>
    </div>

    <h2>Lista de Cines</h2>
    <div class="cuerpo">
        <?php
        require "./logica/conexion.php";
        $sql = "SELECT id_cine, nombre, ubicacion, gerente FROM Cine";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<table border="1">';
            echo '<thead><tr>';
            echo '<th>Nombre</th>';
            echo '<th>Ubicación</th>';
            echo '<th>Gerente</th>';
            echo '<th>Acción</th>';
            echo '</tr></thead>';
            echo '<tbody>';

            while ($fila = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($fila["nombre"]) . '</td>';
                echo '<td>' . htmlspecialchars($fila["ubicacion"]) . '</td>';
                echo '<td>' . htmlspecialchars($fila["gerente"]) . '</td>';
                echo '<td><button onclick="editarCine(' . $fila["id_cine"] . ')">Editar</button></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "<p>No hay cines registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>

    <script>
        function editarCine(id) {
            window.location.href = "./AdminEditarCine.php?id=" + id;
        }
    </script>
</body>
</html>
