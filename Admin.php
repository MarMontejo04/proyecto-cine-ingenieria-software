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
        <form method="POST"  action="./AdminEditar.php">
            <button type="submit">Editar</button>
        </form>
        </form>
        <form method="POST"  action="./index.php">
            <button type="submit">Eliminar</button>
        </form>
    </div>

    <div class="cuerpo">
        <form action="./logica/Admin.php" method="POST">
            <div class="contenido">
                <div class="parteIzq">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required><br><br>

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea><br><br>

                    <label for="clasificacion">Clasificación:</label>
                    <input type="text" id="clasificacion" name="clasificacion" required><br><br>

                    <label for="duracion">Duración (en minutos):</label>
                    <input type="number" id="duracion" name="duracion" required><br><br>

                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero" required><br><br>
                </div>
                
                <div class ="centro">
                    <label for="poster_url">URL del Poster:</label>
                    <input type="text" id="poster_url" name="poster_url" required><br><br>
                </div>

                <div class = "parteDer">
                    <input type="submit" value="Agregar Película">
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>