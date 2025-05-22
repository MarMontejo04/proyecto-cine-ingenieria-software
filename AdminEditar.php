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
        <?php include "./estilos/headerAdmin.php"; ?>
    </header>

    <div class="container-fluid mt-4">
        <div class="text-center mb-4">
            <h1>Editar Peliculas</h1>
            <div class="d-flex justify-content-center gap-3">
                <form method="POST" action="./Admin.php">
                    <button type="submit" class="btn btn-primary">Agregar Películas</button>
                </form>
                <form method="GET" action="./AdminEditarCine.php">
                    <button type="submit" class="btn btn-secondary">Editar Cines</button>
                </form>
                <form method="GET" action="./Vistas/VistasAdmin/Funciones.php">
                    <button type="submit" class="btn btn-secondary">Editar Funciones</button>
                </form>
                <form method="GET" action=".\Vistas\VistasAdmin\AdminSalas.php">
                <button type="submit" class="btn btn-secondary">Editar Salas</button>
            </form>
            </div>
        </div>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'actualizado'): ?>
            <div class="alert alert-success" role="alert">
                ¡Película actualizada correctamente!
            </div>
        <?php elseif (isset($_GET['mensaje']) && $_GET['mensaje'] === 'eliminado'): ?>
            <div class="alert alert-success" role="alert">
                ¡Película eliminada correctamente!
            </div>
        <?php endif; ?>

        <h2 class="mb-4">Lista de películas</h2>

        <div class="cuerpo">
            <?php
                require "./logica/conexion.php";

                $sql = "SELECT id_pelicula, titulo, descripcion, clasificacion, duracion, genero, poster_url FROM Pelicula";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    echo '<div class="table-responsive" style="min-width: 1200px;">';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead class="table-dark"><tr>';
                    echo '<th>Título</th>';
                    echo '<th>Descripción</th>';
                    echo '<th>Clasificación</th>';
                    echo '<th>Duración</th>';
                    echo '<th>Género</th>';
                    echo '<th>Imagen</th>';
                    echo '<th>Guardar</th>';
                    echo '</tr></thead>';
                    echo '<tbody>';

                    while ($fila = $resultado->fetch_assoc()) {
                        echo '<tr>';
                        echo '<form method="POST" action="logica/actualizarPelicula.php">';
                        echo '<input type="hidden" name="id_pelicula" value="' . $fila["id_pelicula"] . '">';
                        echo '<td><input class="form-control" type="text" name="titulo" value="' . htmlspecialchars($fila["titulo"]) . '"></td>';
                        echo '<td><input class="form-control" type="text" name="descripcion" value="' . htmlspecialchars($fila["descripcion"]) . '"></td>';
                        echo '<td><input class="form-control" type="text" name="clasificacion" value="' . htmlspecialchars($fila["clasificacion"]) . '"></td>';
                        echo '<td><input class="form-control" type="text" name="duracion" value="' . htmlspecialchars($fila["duracion"]) . '"></td>';
                        echo '<td><input class="form-control" type="text" name="genero" value="' . htmlspecialchars($fila["genero"]) . '"></td>';
                        echo '<td><input class="form-control" type="text" name="poster_url" value="' . htmlspecialchars($fila["poster_url"]) . '"></td>';
                        echo '<td><button type="submit" name="accion" value="guardar" class="btn btn-success">Guardar</button></td>';
                        echo '</form>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo "<p>No hay películas registradas.</p>";
                }

                $conexion->close();
            ?>
        </div>
    </div>

    <script src="estilos/js/bootstrap.bundle.min.js"></script>
</body>
</html>
