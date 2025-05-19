<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar asientos</title>
    <link href="/estilos/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="/estilos/style.css" rel="stylesheet">
</head>


<body>
    <header>
        <?php include "./estilos/header2.php"; ?>
    </header>

    <?php include "logica/elegirAsientos.php"; ?>

    <div class="container mb-3 mt-3">
        <h2 class="mb-3 mt-3">Selecciona tus asientos</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="pantalla">Pantalla</div>
                <form method="POST" action="procesar_venta.php">
                    <input type="hidden" name="id_funcion" value="<?= $id_funcion ?>">
                    <input type="hidden" name="id_usuario" value="1">
                    <input type="hidden" name="asientos" id="asientos">

                    <?php foreach ($asientos as $fila => $filaAsientos): ?>
                        <div class="fila-asientos mb-2">
                            <strong class="me-2"><?= $fila ?></strong>
                            <?php foreach ($filaAsientos as $asiento): ?>
                                <?php
                                $clase = ($asiento['vendido'] || $asiento['reservado']) ? 'ocupado' : 'disponible';
                                $texto = $asiento['numero'];
                                ?>
                                <div class="asiento <?= $clase ?>" data-id="<?= $asiento['id_asiento'] ?>" data-numero="<?= $fila . $texto ?>">
                                    <?= $texto ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="col-md-4 resumen-compra">
                <h4>Resumen de Compra</h4>
                <p id="resumen">Asientos seleccionados: Ninguno</p>
                <p><strong>Total:</strong> $<span id="total">0</span> MXN</p>
                <button type="submit" class="btn btn-primary mt-3" onclick="irAPago()">Confirmar Compra</button>
            </div>



        </div>
    </div>
    </div>

    <script>
        const seleccionados = new Set();
        const precioPorAsiento = 75;
        const resumen = document.getElementById('resumen');
        const total = document.getElementById('total');
        const inputAsientos = document.getElementById('asientos');

        function actualizarResumen() {
            const seleccionados = document.querySelectorAll('.asiento.seleccionado');
            const resumen = document.getElementById('resumen');
            const total = document.getElementById('total');

            if (seleccionados.length === 0) {
                resumen.textContent = "Asientos seleccionados: Ninguno";
                total.textContent = "0";
                return;
            }

            const etiquetas = Array.from(seleccionados).map(asiento => asiento.dataset.numero);
            resumen.textContent = "Asientos seleccionados: " + etiquetas.join(', ');
            total.textContent = etiquetas.length * precioPorAsiento;
        }

        function irAPago() {
            const asientos = Array.from(document.querySelectorAll('.asiento.seleccionado')).map(a => a.dataset.id);
            if (asientos.length === 0) {
                alert("Selecciona al menos un asiento.");
                return;
            }

            localStorage.setItem('asientosSeleccionados', asientos.join(','));
            localStorage.setItem('totalCompra', asientos.length * precioPorAsiento);

            window.location.href = "Pago.php";
        }

        document.querySelectorAll('.disponible').forEach(el => {
            el.addEventListener('click', () => {
                const id = el.dataset.id;
                el.classList.toggle('seleccionado');

                if (seleccionados.has(id)) {
                    seleccionados.delete(id);
                } else {
                    if (seleccionados.size < 10) {
                        seleccionados.add(id);
                    } else {
                        alert("Máximo 10 asientos por compra.");
                        el.classList.remove('seleccionado');
                        return;
                    }
                }
                actualizarResumen();
            });
        });
    </script>

    <footer>
        <?php include "./estilos/footer.php"; ?>
    </footer>

</body>

</html>