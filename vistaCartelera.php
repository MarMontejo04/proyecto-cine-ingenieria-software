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
        <div class="header">
            <h1>Categorías</h1>
            <h1>Promociones</h1>
        </div>
        <h1>Logotipo</h1>
        <div class="botones">
            <button>Tu cine</button>
            <form method="POST"  action="./index.php">
                <button type="submit">Login</button>
            </form>
        </div>
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
        <div class="col l3 s12">
          <h5 class="black-text">Redes Sociales</h5>
          <ul>
            <li><a class="black-text" href="https://github.com/MarMontejo04">GitHub</a></li>
            <li><a class="black-text" href="https://www.facebook.com/?locale=es_LA">Facebook</a></li>
            <li><a class="black-text" href="https://www.instagram.com/">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
</body>
</html>