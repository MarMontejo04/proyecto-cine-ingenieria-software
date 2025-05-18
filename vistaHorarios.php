<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css">
    <link href="./estilos/style.css" rel="stylesheet">

</head>
<body>
    <header>
        <?php include "./estilos/header2.php"; ?>
    </header>

    <div>

        <div class = "container my-4" >

            <div class="row g-4"> 
                <div class="col-lg-3">
                    <input type="text" placeholder="Busca película">
                </div>

                <div class="col-lg-3 col-md-6 text-end">
                    <a href="vistaCartelera.php" class="fs-4 fw-bold text-decoration-none">Cartelera</a>
                </div> 

                <div class="col-lg-3 col-md-6 text-start">
                    <a href="vistaHorarios.php" class="fs-4 fw-bold text-decoration-none">Horarios</a>
                </div>
                
            </div>
        </div>

        <div class="d-flex justify-content-center my-5">
            <div class="w-25">
                <label for="opciones" class="form-label d-flex align-items-center justify-content-center gap-2 mb-3">
                <i class="bi bi-geo-alt-fill text-dark opacity-75"></i>
                <span class="fw-semibold text-dark">Cine:</span>
                </label>
                
                <select id="opciones" name="opciones" class="form-select border-0 shadow-sm">
                    <option value="opcion1">Cine 1</option>
                    <option value="opcion2">Cine 2</option>
                    <option value="opcion3">Cine 3</option>
                    <option value="opcion1">Cine 1</option>            
                </select>
            </div>
        </div>


    </div>
        <div class="peliculas">
        <?php include("./logica/Horarios.php"); ?>
    </div>

    <footer>  
        <?php include "./estilos/footer.php"; ?>
    </footer>
    
</body>
</html>