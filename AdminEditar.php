

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminAgregarPelicula</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="./estilos/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/estiloAgregar.css">

</head>
<body>
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="ECE">
        <h1>Admin</h1>

        <form method="POST"  action="./Admin.php">
            <button type="submit">Agregar Peliculas</button>
        </form>
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
                echo '<th>Eliminar</th>';

                echo '</tr></thead>';
                echo '<tbody>';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<form method="POST" action="logica/actualizarPelicula.php">';
                    echo '<input type="hidden" name="id_pelicula" value="' . $fila["id_pelicula"] . '">';
                    echo '<td><input type="text" name="titulo" value="' . htmlspecialchars($fila["titulo"]) . '"></td>';
                    echo '<td><input type="text" name="descripcion" value="' . htmlspecialchars($fila["descripcion"]) . '"></td>';
                    echo '<td><input type="text" name="clasificacion" value="' . htmlspecialchars($fila["clasificacion"]) . '"></td>';
                    echo '<td><input type="text" name="duracion" value="' . htmlspecialchars($fila["duracion"]) . '"></td>';
                    echo '<td><input type="text" name="genero" value="' . htmlspecialchars($fila["genero"]) . '"></td>';
                    echo '<td><button type="submit">Guardar</button></td>';
                    echo '<td><button type="submit">Eliminar</button></td>';

                    echo '</form>';
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
