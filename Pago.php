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

    <div>
        <form method="POST" action="procesar_venta.php">
            <input type="hidden" name="id_usuario" value="<?= $_SESSION['usuario_id'] ?>">
            <input type="hidden" name="id_funcion" value="<?=$id_funcion?>">

            <?php foreach ($asientos as $id): ?>
                <input type="hidden" name="asientos[]" value="<?= $id ?>">
            <?php endforeach; ?>

            <label>Método de pago:</label>
            <input type="text" name="tipo" required>

            <label>Datos:</label>
            <input type="text" name="datos" required>

            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="cantidad" value="<?= count($asientos) ?>">

            <button type="submit">Finalizar compra</button>
        </form>


    </div>

    <footer>
        <?php include "./estilos/footer.php"; ?>
    </footer>
    <script>
        document.getElementById('asientos_input').value = localStorage.getItem('asientos');
        document.getElementById('total_display').textContent = localStorage.getItem('totalCompra');
    </script>

</body>

</html>