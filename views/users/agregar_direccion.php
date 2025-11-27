<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Dirección</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=tienda&action=index">Agregar dirección</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container py-5">
    <h2 class="mb-4">Agregar Dirección</h2>
    <form method="POST" action="index.php?controller=direccion&action=guardar">
        <div class="mb-3">
            <input type="text" name="pais" class="form-control" placeholder="País" required>
        </div>
        <div class="mb-3">
            <input type="text" name="provincia" class="form-control" placeholder="Provincia">
        </div>
        <div class="mb-3">
            <input type="text" name="distrito" class="form-control" placeholder="Distrito">
        </div>
        <div class="mb-3">
            <input type="text" name="calle" class="form-control" placeholder="Calle" required>
        </div>
        <div class="mb-3">
            <input type="text" name="codigo_postal" class="form-control" placeholder="Código Postal">
        </div>
        <div class="mb-3">
            <textarea name="detalles_direccion" class="form-control" placeholder="Detalles de la dirección"></textarea>
        </div>
        <button type="submit" class="btn btn-success w-100">Guardar Dirección</button>
    </form>


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
