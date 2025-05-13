<?php
require 'conexion.php';


$sql = "SELECT titulo, genero, poster_url FROM Pelicula";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo '<div class="pelicula">';
        echo '<img src="' . htmlspecialchars($fila["poster_url"]) . '" alt="' . htmlspecialchars($fila["titulo"]) . '">';
        echo '<h3>' . htmlspecialchars($fila["titulo"]) . '</h3>';
        echo '<div class="info-compra">';
        echo '<span>' . htmlspecialchars($fila["genero"]) . '</span>';
        echo '<button>Comprar</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>No hay películas registradas.</p>";
}

$conexion->close();
?>
