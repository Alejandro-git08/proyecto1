<!-- views/users/carrito.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mi Carrito</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card img { object-fit: cover; height: 100%; }
        .card-body h5 { font-weight: 600; }
    </style>
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
                <li class="nav-item"><a class="nav-link" href="index.php?controller=cliente&action=verCarrito">Carrito</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <h2 class="mb-4">Mi Carrito</h2>

    <?php if(empty($productos)): ?>
        <div class="alert alert-info">Tu carrito está vacío.</div>
        <a href="index.php?controller=cliente&action=verProductos" class="btn btn-primary">Ir a la tienda</a>
    <?php else: ?>
        <div class="row">
            <?php $total_general = 0; ?>
            <?php foreach($productos as $prod): ?>
                <?php $total_general += $prod['precio'] * $prod['cantidad']; ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="<?php echo $prod['imagen']; ?>" class="img-fluid rounded-start" alt="<?php echo $prod['nombre_producto']; ?>">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $prod['nombre_producto']; ?></h5>
                                    <p class="card-text">Cantidad: <?php echo $prod['cantidad']; ?></p>
                                    <p class="card-text text-success">$<?php echo number_format($prod['precio'], 2); ?></p>
                                    <p class="card-text"><strong>Total: $<?php echo number_format($prod['precio'] * $prod['cantidad'], 2); ?></strong></p>
                                    <a href="index.php?controller=cliente&action=eliminarDelCarrito&id_producto=<?php echo $prod['id_producto']; ?>" class="btn btn-danger btn-sm w-100">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="index.php?controller=tienda&action=index" class="btn btn-secondary">Seguir comprando</a>
            <div>
                <h5 class="mb-3">Total general: $<?php echo number_format($total_general, 2); ?></h5>
                <a href="index.php?controller=cliente&action=seleccionarDireccion" class="btn btn-success">Comprar todo</a>
            </div>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
