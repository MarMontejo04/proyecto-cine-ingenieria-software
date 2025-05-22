<?php
session_start();

$id_funcion = $_POST['id_funcion'];
$asientos = $_POST['asientos'] ?? [];
$total = $_POST['total'] ?? 0;
$cantidad = $_POST['cantidad'] ?? 0;
$numero_pedido = rand(1, 500);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link href="/estilos/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="/estilos/style.css" rel="stylesheet">
</head>

<body class="fondo2 pagina-pago">

    <header>
        <?php include "./estilos/header2.php"; ?>
    </header>

    <div class="pagina-pago__contenido">
        <h2 class="mb-4 text-center">Selecciona método de pago</h2>
            <form method="POST" action="Recibo.php" id="form-pago" class="pagina-pago__formulario">
            
            <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
            <input type="hidden" name="id_funcion" value="<?= $id_funcion ?>">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="cantidad" value="<?= count($asientos) ?>">

            <?php foreach ($asientos as $id): ?>
                <input type="hidden" name="asientos[]" value="<?= $id ?>">
            <?php endforeach; ?>

            <div class="btn-group mb-4 w-100" role="group" aria-label="Método de pago">
                <input type="radio" class="btn-check" name="tipo" id="tarjeta" value="tarjeta" autocomplete="off" required>
                <label class="btn btn-outline-primary w-50" for="tarjeta">Tarjeta</label>

                <input type="radio" class="btn-check" name="tipo" id="caja" value="caja" autocomplete="off" required>
                <label class="btn btn-outline-secondary w-50" for="caja">Pago en caja</label>
            </div>

            <div id="datos-tarjeta" class="mb-4" style="display:none;">
                <div class="form-group mb-3">
                    <label for="num_tarjeta">Número de tarjeta</label>
                    <input type="text" class="form-control" name="datos[numero]" id="num_tarjeta" maxlength="16">
                </div>
                <div class="form-group mb-3">
                    <label for="titular">Nombre del titular</label>
                    <input type="text" class="form-control" name="datos[titular]" id="titular">
                </div>
                <div class="form-row row">
                    <div class="col mb-3">
                        <label for="vencimiento">Vencimiento</label>
                        <input type="month" class="form-control" name="datos[vencimiento]" id="vencimiento">
                    </div>
                    <div class="col mb-3">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" name="datos[cvv]" id="cvv" maxlength="4">
                    </div>
                </div>
            </div>

            <div id="datos-caja" class="mb-4 text-center" style="display:none;">
                <div class="compra text-center">
                    Tu número de pedido es: <strong style="font-size:1.5rem;"><?= $numero_pedido ?></strong><br>
                    Presiona el boton de finalizar compra
                    y preséntalo en caja para pagar.
                </div>
                <input type="hidden" name="datos[numero_pedido]" value="<?= $numero_pedido ?>">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-5 py-2">Finalizar compra</button>
            </div>
        </form>
    </div>

    <footer class="mt-5">
        <?php include "./estilos/footer.php"; ?>
    </footer>

    <script>
        const radioTarjeta = document.getElementById('tarjeta');
        const radioCaja = document.getElementById('caja');
        const datosTarjeta = document.getElementById('datos-tarjeta');
        const datosCaja = document.getElementById('datos-caja');

        radioTarjeta.addEventListener('change', () => {
            datosTarjeta.style.display = 'block';
            datosCaja.style.display = 'none';
        });

        radioCaja.addEventListener('change', () => {
            datosCaja.style.display = 'block';
            datosTarjeta.style.display = 'none';
        });
    </script>

</body>

</html>
