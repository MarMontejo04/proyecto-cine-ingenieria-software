<!-- VISTA CARTELERA -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css">
</head>
<body>
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="cabecera">
        <div class="buscador">
            <input type="text" placeholder="Busca película">
        </div>
        <div class="medio">
            <div class="superior">
                <h2>Cartelera</h2>
                <h2>Horarios</h2>
            </div>
            <div class="inferior">
                <label for="opciones">Cine:</label>
                <select id="opciones" name="opciones">
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                </select>
            </div>
        </div>
    </div>

    <div class="peliculas">
    <?php include("./logica/cartelera.php"); ?>
    </div>

    <footer class="page-footer fondopastel">
    <div class="container">
      <div class="row">
        
      </div>
    </div>
    <div class="footer-copyright">
     
    </div>
  </footer>
</body>
</html>