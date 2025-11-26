<!DOCTYPE html>
<html lang="es">
<head>
    <title>Seleccionar Dirección y Método de Pago</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php?controller=home&action=index">Tienda V</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=home&action=index">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php?controller=cliente&action=seleccionarDireccion">Comprar</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=cliente&action=verCarrito">Carrito</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container py-5">
    <h2 class="mb-4">Selecciona una dirección y método de pago para tu compra</h2>

    <?php if (!$direcciones): ?>
        <p>No tienes direcciones registradas. <a href="index.php?controller=direccion&action=crear">Agrega una ahora</a>.</p>
    <?php else: ?>
        <form action="index.php?controller=cliente&action=comprarCarrito" method="POST">

            <!-- Selección de dirección -->
            <h4>Dirección</h4>
            <?php foreach ($direcciones as $dir): ?>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="id_direccion" value="<?php echo $dir['id_direccion']; ?>" required>
                    <label class="form-check-label">
                        <?php echo "{$dir['calle']}, {$dir['distrito']}, {$dir['provincia']}, {$dir['pais']}"; ?>
                    </label>
                </div>
            <?php endforeach; ?>

            <!-- Selección de método de pago -->
            <h4 class="mt-4">Método de Pago</h4>
            <?php 
                $metodos = ['simulado' => 'Simulado', 'yappy' => 'Yappy', 'tarjeta' => 'Tarjeta', 'paypal' => 'Paypal'];
            ?>
            <?php foreach ($metodos as $key => $label): ?>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="metodo_pago" value="<?php echo $key; ?>" required>
                    <label class="form-check-label"><?php echo $label; ?></label>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-success mt-3">Continuar con la compra</button>
        </form>
    <?php endif; ?>
</div>

<!-- Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Tienda V</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><i class="fas fa-map-marker-alt fa-fw"></i> Panamá, Panamá</li>
                        <li><i class="fa fa-phone fa-fw"></i> <a class="text-decoration-none" href="tel:010-020-0340">010-021-020-0340</a></li>
                        <li><i class="fa fa-envelope fa-fw"></i> <a class="text-decoration-none" href="mailto:tiendav@company.com">tiendav@company.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php?controller=tienda&action=index">Ropa hombre</a></li>
                        <li><a class="text-decoration-none" href="index.php?controller=tienda&action=index">Ropa mujer</a></li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Información</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php?controller=home&action=index">Inicio</a></li>
                        <li><a class="text-decoration-none" href="index.php?controller=home&action=about">Sobre nosotros</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-100 bg-black py-3">
                <div class="container">
                    <p class="text-left text-light">Copyright &copy; 2025 Grupo #2 | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</body>
</html>
