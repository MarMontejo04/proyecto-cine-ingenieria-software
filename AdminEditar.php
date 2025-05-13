

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminAgregarPelicula</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css">
    <link rel="stylesheet" href="./estilos/estiloAgregar.css">

</head>
<body>
    <header>
        <div class="header">
        </div>
        <h1>Logotipo</h1>
        <div class="botones">
            <button>Tu cine</button>
            <form method="POST"  action="./index.php">
                <button type="submit">Login</button>
            </form>
        </div>
    </header>
    <div class="ECE">
        <form method="POST"  action="./Admin.php">
            <button type="submit">Agregar</button>
        </form>
        </form>
        <form method="POST"  action="./index.php">
            <button type="submit">Eliminar</button>
        </form>
    </div>

    <h2>Lista de peliculas</h2>
    <div class="cuerpo">
        <?php
            require "./logica/conexion.php";
            $sql = "SELECT id_pelicula, titulo, descripcion, clasificacion, duracion, genero, poster_url FROM Pelicula";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<table border="1">';
                echo '<thead><tr>';
                echo '<th>Título</th>';
                echo '<th>Descripción</th>';
                echo '<th>Clasificación</th>';
                echo '<th>Duración</th>';
                echo '<th>Género</th>';
                echo '<th>Acción</th>';
                echo '</tr></thead>';
                echo '<tbody>';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($fila["titulo"]) . '</td>';
                    echo '<td>' . htmlspecialchars($fila["descripcion"]) . '</td>';
                    echo '<td>' . htmlspecialchars($fila["clasificacion"]) . '</td>';
                    echo '<td>' . htmlspecialchars($fila["duracion"]) . '</td>';
                    echo '<td>' . htmlspecialchars($fila["genero"]) . '</td>';
                    echo '<td><button onclick="editarPelicula(' . $fila["id_pelicula"] . ')">Editar</button></td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p>No hay películas registradas.</p>";
            }

            $conexion->close();
            ?>
            
    </div>
</body>
</html>

</script>
