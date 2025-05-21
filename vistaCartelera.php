<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
    exit();
}
$correo = $_SESSION['username'];


require('logica/conexion.php');

mysqli_set_charset($conexion, 'utf8');

if (!isset($correo)) {
    header("location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign in</title>
    <link rel="stylesheet" href="./estilos/estiloInicioCartelera.css" />
    <link href="./estilos/style.css" rel="stylesheet" />
</head>

<body class="fondo2 h-100">
    <header>
        <?php include './estilos/header2.php'; ?>
    </header>

    <div>
        <div class = "container my-4" >
            <div class="row g-4"> 
                <div class="col-lg-3 col-md-6 text-center">
                    <h1 class="fs-4 fw-bold text-decoration-none">Cartelera</h1>
                </div>        
            </div>
        </div>
    </div>

<div class="modal fade" id="modalFunciones" tabindex="-1" aria-labelledby="modalFuncionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalFuncionesLabel">Funciones disponibles</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body" id="funcionesContenido">
            Cargando funciones...
        </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.ver-funciones').forEach(button => {
            button.addEventListener('click', function () {
                const idPelicula = this.dataset.id;
                const idCine = this.dataset.cine;

                fetch(`./logica/obtener_funciones.php?id_pelicula=${idPelicula}&id_cine=${idCine}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('funcionesContenido').innerHTML = html;
                        const modal = new bootstrap.Modal(document.getElementById('modalFunciones'));
                        modal.show();
                    })
                    .catch(err => {
                        document.getElementById('funcionesContenido').innerHTML = 'Error al cargar funciones.';
                    });
            });
        });
    });
    </script>


    <div class="peliculas">
        <?php include("./logica/cartelera.php"); ?>
    </div>

    <footer>
        <?php include "./estilos/footer.php"; ?>
    </footer>
</body>
</html>
