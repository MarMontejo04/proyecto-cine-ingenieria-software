<?php
require 'conexion.php';

$sql = "SELECT id_pelicula, titulo, genero, poster_url FROM Pelicula";
$resultado = $conexion->query($sql);
?>

<div class="container py-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="col">';
                echo '  <div class="pelicula h-100 text-center">';
                echo '      <img src="' . htmlspecialchars($fila["poster_url"]) . '" alt="' . htmlspecialchars($fila["titulo"]) . '" class="img-fluid mb-2 rounded">';
                echo '      <h5 class="mb-1">' . htmlspecialchars($fila["titulo"]) . '</h5>';
                echo '      <span class="text-muted mb-2 d-block">' . htmlspecialchars($fila["genero"]) . '</span>';

                // Obtener funciones de la película
                $id_pelicula = $fila["id_pelicula"];
                $queryFunciones = "SELECT dia, hora, idioma, tipo_funcion FROM Funcion WHERE id_pelicula = $id_pelicula AND estado = 1 ORDER BY dia, hora";
                $resultFunciones = $conexion->query($queryFunciones);

                if ($resultFunciones->num_rows > 0) {
                    echo '<div class="mb-2">';
                    echo '<h6>Horarios:</h6>';
                    while ($funcion = $resultFunciones->fetch_assoc()) {
                        $texto = $funcion["dia"] . ' - ' . $funcion["hora"] . ' (' . $funcion["idioma"] . ' / ' . $funcion["tipo_funcion"] . ')';
                        echo '<span class="badge bg-secondary d-block mb-1">' . htmlspecialchars($texto) . '</span>';
                    }
                    echo '</div>';
                } else {
                    echo '<p class="text-muted">Sin horarios disponibles.</p>';
                }

                echo '      <form action="ComprarBoletoA.php" method="GET">';
                echo '          <input type="hidden" name="pelicula_id" value="' . $fila["id_pelicula"] . '">';
                echo '          <button type="submit" class="btn btn-dark w-100">Comprar</button>';
                echo '      </form>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo "<p>No hay películas registradas.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>
