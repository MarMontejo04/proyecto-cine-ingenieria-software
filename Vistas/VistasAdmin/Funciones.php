<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminEditarCine</title>
    <link href="../../estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../estilos/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estiloAgregar.css">
</head>
<body>
    <header>
        <?php include "../../estilos/headerAdmin.php"; ?>
    </header>

    <div class="ECE text-center my-4">
        <h1>Administrador de Funciones</h1>
        <div class="d-flex justify-content-center gap-3 mb-4">
            <form method="POST" action="../../AdminEditar.php">
                <button type="submit" class="btn btn-primary">Editar Películas</button>
            </form>
            <form method="GET" action="../../Admin.php">
                <button type="submit" class="btn btn-secondary">Agregar Pelicula</button>
            </form>
            <form method="GET" action="../../AdminEditarCine.php">
                <button type="submit" class="btn btn-secondary">Editar Cine</button>
            </form>
             <form method="GET" action="../../\Vistas\VistasAdmin\AdminSalas.php">
                <button type="submit" class="btn btn-secondary">Editar Salas</button>
            </form>

        </div>
    </div>

    <div class="container mt-4">
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'ok'): ?>
            <div class="alert alert-success" role="alert">
                ¡Funciones actualizado correctamente!
            </div>
        <?php endif; ?>

        <h2 class="mb-4">Lista de Funciones</h2>

        <?php
        require "../../logica/conexion.php";

        $sql = "SELECT f.id_funcion, f.id_pelicula, f.id_sala, f.dia, f.hora, f.idioma, f.subtitulo, f.tipo_funcion, f.estado, p.titulo,
            c.id_cine, c.nombre AS cine_nombre, 
            s.id_sala, s.nombre AS sala_nombre
        FROM Funcion f
        INNER JOIN Pelicula p ON f.id_pelicula = p.id_pelicula
        INNER JOIN Sala s ON f.id_sala = s.id_sala
        INNER JOIN Cine c ON s.id_cine = c.id_cine
        ORDER BY f.id_funcion ASC";


        
        $peliculas = [];
            $queryPeliculas = "SELECT id_pelicula, titulo FROM Pelicula";
            $resultPeliculas = $conexion->query($queryPeliculas);

            if ($resultPeliculas->num_rows > 0) {
                while ($row = $resultPeliculas->fetch_assoc()) {
                    $peliculas[$row['id_pelicula']] = $row['titulo'];
                }
            }

        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>Cine</th>';
            echo '<th>Sala</th>';
            echo '<th>Pelicula</th>';
            echo '<th>Dia</th>';
            echo '<th>Hora</th>';
            echo '<th>Idioma</th>';
            echo '<th>Subtitulos</th>';
            echo '<th>Funcion</th>';
            echo '<th>Estado</th>';
            echo '<th>Acción</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($fila = $resultado->fetch_assoc()) {

                echo '<tr>';
                echo '<form method="POST" action="../../logica/funciones.php">';
                echo '<input type="hidden" name="id_funcion" value="' . $fila["id_funcion"] . '">';
                echo '<td>' . htmlspecialchars($fila["cine_nombre"]) . '</td>';
                echo '<td>' . htmlspecialchars($fila["sala_nombre"]) . '</td>';
                echo '<td><select class="form-control" name="id_pelicula">';
                    foreach ($peliculas as $id => $titulo) {
                        $selected = ($id == $fila["id_pelicula"]) ? 'selected' : '';
                        echo '<option value="' . $id . '" ' . $selected . '>' . htmlspecialchars($titulo) . '</option>';
                    }
                    echo '</select></td>';
                echo '<td><input class="form-control" type="text" name="dia" value="' . htmlspecialchars($fila["dia"]) . '"></td>';
                echo '<td>' . htmlspecialchars($fila["hora"]) . '</td>';
                echo '<input type="hidden" name="hora" value="' . htmlspecialchars($fila["hora"]) . '">';


                echo '<td><select class="form-control" type="text" name="idioma">';
                    $idiomas = ['Español', 'Inglés',];
                        foreach ($idiomas as $idioma){
                                $selected = ($idioma == $fila["idioma"]) ? 'selected' : '';
                                echo '<option value="' . $idioma . '" ' . $selected . '>' . $idioma . '</option>';
                        }
                echo '<td><select class="form-control" type="text" name="subtitulo">';
                    $subtitulos = ['1', '0'];
                        foreach ($subtitulos as $subtitulo){
                                $selected = ($subtitulo == $fila["subtitulo"]) ? 'selected' : '';
                                echo '<option value="' . $subtitulo . '" ' . $selected . '>' . $subtitulo . '</option>';
                        }
                echo '<td><select class="form-control" type="text" name="tipo_funcion">';
                    $funciones = ['Normal', 'VIP'];
                        foreach ($funciones as $funcion){
                                $selected = ($funcion == $fila["tipo_funcion"]) ? 'selected' : '';
                                echo '<option value="' . $funcion . '" ' . $selected . '>' . $funcion . '</option>';
                        }
                echo '<td><select class="form-control" type="text" name="estado">';
                    $estados = ['activa', 'finalizada', 'cancelada'];
                        foreach ($estados as $estado){
                                $selected = ($estado == $fila["estado"]) ? 'selected' : '';
                                echo '<option value="' . $estado . '" ' . $selected . '>' . $estado . '</option>';
                        }

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

    <script src="../../estilos/js/bootstrap.bundle.min.js"></script>
</body>
</html>
