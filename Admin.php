<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminAgregarPelicula</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./estilos/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="./estilos/estiloAgregar.css" />
</head>
<body>
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="ECE text-center my-4">
        <h1>Agregar Peliculas</h1>
        <div class="d-flex justify-content-center gap-3 mb-4">
            <form method="POST" action="./AdminEditar.php">
                <button type="submit" class="btn btn-primary">Editar Películas</button>
            </form>
            <form method="GET" action="./AdminEditarCine.php">
                <button type="submit" class="btn btn-secondary">Editar Cine</button>
            </form>
            <form method="GET" action="./Vistas/VistasAdmin/Funciones.php">
                <button type="submit" class="btn btn-secondary">Editar Funciones</button>
            </form>
        </div>


    </div>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'ok'): ?>
        <div class="alert alert-success" role="alert">
            ¡Película agregada correctamente!
        </div>
    <?php endif; ?>    

    <div class="cuerpo">
        <form action="./logica/Admin.php" method="POST">
            <div class="contenido">
                <div class="parteIzq">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required /><br /><br />

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea><br /><br />

                    <label for="clasificacion">Clasificación:</label>
                    <input type="text" id="clasificacion" name="clasificacion" required /><br /><br />

                    <label for="duracion">Duración (en minutos):</label>
                    <input type="number" id="duracion" name="duracion" required /><br /><br />

                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero" required /><br /><br />
                </div>

                <div class="centro">
                    <label for="poster_url">URL del Poster:</label>
                    <input type="text" id="poster_url" name="poster_url" required /><br /><br />
                </div>

                <div class="parteDer">
                    <input type="submit" value="Agregar Película" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>
