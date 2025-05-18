<?php
require 'conexion.php';

$cines = [];
$sql_cines = "SELECT id_cine, nombre FROM Cine";
$result_cines = $conexion->query($sql_cines);
while ($row = $result_cines->fetch_assoc()) {
    $cines[$row['id_cine']] = $row['nombre'];
}

$id_cine_seleccionado = isset($_GET['id_cine']) ? intval($_GET['id_cine']) : 0;

$sql = "
    SELECT DISTINCT p.id_pelicula, p.titulo, p.descripcion, p.genero, p.poster_url,
        c.id_cine, c.nombre AS cine_nombre
    FROM Pelicula p
    INNER JOIN Funcion f ON f.id_pelicula = p.id_pelicula
    INNER JOIN Sala s ON f.id_sala = s.id_sala
    INNER JOIN Cine c ON s.id_cine = c.id_cine
";

if ($id_cine_seleccionado > 0) {
    $sql .= " WHERE c.id_cine = $id_cine_seleccionado";
}

$resultado = $conexion->query($sql);
?>

<div class="d-flex justify-content-center my-5">
    <form method="GET" class="w-25">
        <label for="id_cine" class="form-label d-flex align-items-center justify-content-center gap-2 mb-3">
            <i class="bi bi-geo-alt-fill text-dark opacity-75"></i>
            <span class="fw-semibold text-dark">Cine:</span>
        </label>
        <select class="form-control" name="id_cine" id="id_cine" onchange="this.form.submit()">
            <option value="0">-- Todos los cines --</option>
            <?php
            foreach ($cines as $id => $nombre) {
                $selected = ($id == $id_cine_seleccionado) ? 'selected' : '';
                echo '<option value="' . $id . '" ' . $selected . '>' . htmlspecialchars($nombre) . '</option>';
            }
            ?>
        </select>
    </form>
</div>

<div class="container py-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        <?php
        if ($resultado->num_rows > 0) {
            $peliculas_mostradas = [];

            while ($fila = $resultado->fetch_assoc()) {
                if (in_array($fila["id_pelicula"], $peliculas_mostradas)) {
                    continue;
                }

                $peliculas_mostradas[] = $fila["id_pelicula"];

                echo '<div class="col">';
                echo '  <div class="pelicula h-100 text-center">';
                echo '      <img src="' . htmlspecialchars($fila["poster_url"]) . '" alt="' . htmlspecialchars($fila["titulo"]) . '" class="img-fluid mb-2 rounded">';
                echo '      <h5 class="mb-1">' . htmlspecialchars($fila["titulo"]) . '</h5>';
                echo '      <span class="text-muted mb-2 d-block">' . htmlspecialchars($fila["genero"]) . '</span>';
                echo '      <span class="text-muted mb-2 d-block">' . htmlspecialchars($fila["cine_nombre"]) . '</span>';
                echo '      <button 
                                class="btn rounded-pill text-white gradient-custom ver-funciones" 
                                data-id="' . $fila['id_pelicula'] . '" 
                                data-cine="' . $id_cine_seleccionado . '"
                            >
                                Seleccionar
                            </button>';
                echo '  </div>';
                echo '</div>';
            }

        } else {
            echo "<p class='text-center'>No hay películas registradas para este cine.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>
