<!-- VISTA CARTELERA -->
<!-- SIN SESION INICIADA -->

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

    <div>
        <div class="container">
            <div class="row"> 
                <div class="col-md-4"s>
                    <input type="text" placeholder="Busca película">
                </div>

                <div class="col-md-4">
                    <a href="Cartelera">Cartelera</a>
                </div> 
        
                <div class="col-md-4">
                    <a href="Horarios">Horarios</a>
                </div>
                
                <div class="col-md-4">
                    <a href="Horarios">Horarios</a>
                </div>
                
                
            </div>
        </div>

        <div>
            <label for="opciones">Cine:</label>
                <select id="opciones" name="opciones">
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                </select>
        </div>


    </div>


    <!-- IMAGENES EN CARTELERA -->
    <div class="peliculas">
    <?php include("./logica/cartelera.php"); ?>
    </div>

    <footer>  
        <?php include "./estilos/footer.php"; ?>
    </footer>
</body>
</html>