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


<body class="fondo2 h-100">
    <header>
        <?php include "./estilos/header2.php"; ?>
    </header>

    <?php include "logica/elegirAsientos.php"; ?>

    <div class="container mb-3 mt-3">
        <form method="POST" id="form-compra">
            <input type="hidden" name="id_funcion" value="<?= $id_funcion ?>">
            <input type="hidden" name="username1" value="<?= $_SESSION['username']?>">
            <input type="hidden" name="asientos" id="asientos">

            <div class="row">
                <div class="col-md-8 p-5">
                    <div class="pantalla">Pantalla</div>
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

                </div>


                <div class="col-md-4 resumen-compra">
                    <h4>Resumen de Compra</h4>
                    <p id="resumen">Asientos seleccionados: Ninguno</p>
                    <p><strong>Total:</strong> $<span id="total">0</span> MXN</p>
                    <button type="button" class="btn btn-primary mt-3" onclick="irAPago()">Confirmar Compra</button>
                </div>

                <div class="pantalla2">.</div>



            </div>
        </form>
    </div>



    <script>
        const seleccionados = new Set();
        const precioPorAsiento = 75;
        const resumen = document.getElementById('resumen');
        const total = document.getElementById('total');
        const inputAsientos = document.getElementById('asientos');

        function actualizarResumen() {
            const activos = document.querySelectorAll('.asiento.seleccionado');
            if (activos.length === 0) {
                resumen.textContent = "Asientos seleccionados: Ninguno";
                total.textContent = "0";
                return;
            }

            const etiquetas = Array.from(activos).map(a => a.dataset.numero);
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


            // Crea inputs ocultos con los IDs seleccionados
        asientos.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'asientos[]';
            input.value = id;
            document.getElementById('form-compra').appendChild(input);
        });

// También agrega el total
        const totalInput = document.createElement('input');
            totalInput.type = 'hidden';
            totalInput.name = 'total';
            totalInput.value = asientos.length * precioPorAsiento;
            document.getElementById('form-compra').appendChild(totalInput);

// Cantidad de boletos
        const cantidadInput = document.createElement('input');
            cantidadInput.type = 'hidden';
            cantidadInput.name = 'cantidad';
            cantidadInput.value = asientos.length;
            document.getElementById('form-compra').appendChild(cantidadInput);

// Envía el formulario
            document.getElementById('form-compra').action = 'Pago.php';
            document.getElementById('form-compra').method = 'POST';
            document.getElementById('form-compra').submit();


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