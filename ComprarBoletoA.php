<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link href="./estilos/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="./estilos/style.css" rel="stylesheet">
</head>


<body>
    <header>
        <?php include "./estilos/header.php"; ?>
    </header>

    <div class="container mb-3 mt-3">
        <div class="py-5 text-center">
            <img src="" alt="">
            <p>Hola</p>
        </div>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3"> <span class="text-primary">Your cart</span> <span class="badge bg-primary rounded-pill">3</span> </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Product name</h6> <small class="text-body-secondary">Brief description</small>
                        </div> <span class="text-body-secondary">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Second product</h6> <small class="text-body-secondary">Brief description</small>
                        </div> <span class="text-body-secondary">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Third item</h6> <small class="text-body-secondary">Brief description</small>
                        </div> <span class="text-body-secondary">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6> <small>EXAMPLECODE</small>
                        </div> <span class="text-success">−$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between"> <span>Total (USD)</span> <strong>$20</strong> </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group"> <input type="text" class="form-control" placeholder="Promo code"> <button type="submit" class="btn btn-secondary">Redeem</button> </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                
            </div>
        </div>
    </div>
    <footer>
        <?php include "./estilos/footer.php"; ?>
    </footer>

</body>

</html>