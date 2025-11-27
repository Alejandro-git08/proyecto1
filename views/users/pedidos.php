<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mis Pedidos</title>
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
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php?controller=home&action=index">Tienda V</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=home&action=index">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php?controller=cliente&action=verPedidos">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">

        <!-- Botón para regresar a Home -->
        <div class="mb-4">
            <a href="index.php?controller=cliente&action=home" class="btn btn-secondary">Regresar a Home</a>
        </div>

        <h2 class="mb-4">Mis Pedidos</h2>

        <?php if (empty($pedidos['ordenes'])): ?>
            <p>No has realizado ningún pedido aún.</p>
            <a href="index.php?controller=tienda&action=index" class="btn btn-primary">Ir a la tienda</a>
        <?php else: ?>

            <?php foreach ($pedidos['ordenes'] as $orden): ?>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        Pedido #<?php echo $orden['id_orden']; ?> - <?php echo $orden['fecha']; ?> - Estado: <?php echo $orden['estado_orden']; ?>
                    </div>
                    <div class="card-body">
                        <p><strong>Dirección:</strong> <?php echo "{$orden['calle']}, {$orden['distrito']}, {$orden['provincia']}, {$orden['pais']}"; ?></p>
                        <p><strong>Método de pago:</strong> <?php echo $orden['metodo_pago']; ?> (Estado: <?php echo $orden['estado_pago']; ?>)</p>
                        <p><strong>Código de transacción:</strong> <?php echo $orden['codigo_transaccion']; ?></p>
                        <p><strong>Total:</strong> $<?php echo number_format($orden['total'], 2); ?></p>

                        <h5>Productos:</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedidos['detalle'][$orden['id_orden']] as $prod): ?>
                                    <tr>
                                        <td><?php echo $prod['nombre_producto']; ?></td>
                                        <td>$<?php echo number_format($prod['precio_unitario'], 2); ?></td>
                                        <td><?php echo $prod['cantidad']; ?></td>
                                        <td>$<?php echo number_format($prod['subtotal'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
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

    <script src="/proyectos/proyecto1/assets/js/jquery-1.11.0.min.js"></script>
    <script src="/proyectos/proyecto1/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/proyectos/proyecto1/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/proyectos/proyecto1/assets/js/templatemo.js"></script>
    <script src="/proyectos/proyecto1/assets/js/custom.js"></script>

</body>
</html>