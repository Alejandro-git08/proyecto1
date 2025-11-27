<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mi Perfil</title>
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

        .panel {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .seccion-titulo {
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #333;
        }
        .direccion-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            background: #fafafa;
        }
        .divider {
            height: 1px;
            background: #ddd;
            margin: 25px 0;
        }
    </style>

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
                <li class="nav-item"><a class="nav-link active" href="index.php?controller=perfil&action=index">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=cliente&action=verCarrito">Carrito</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">

    <h2 class="mb-4">Mi Perfil</h2>

    <div class="panel">

        <!-- Sección de datos del usuario -->
        <div>
            <div class="seccion-titulo">Datos personales</div>

            <p><strong>Nombre:</strong> <?= $usuario['nombre'] . " " . $usuario['apellido'] ?></p>
            <p><strong>Correo:</strong> <?= $usuario['email'] ?></p>
            <p><strong>Teléfono:</strong> <?= $usuario['telefono'] ?></p>

            <a href="index.php?controller=perfil&action=editar" class="btn btn-primary btn-sm">Editar datos</a>
        </div>

        <div class="divider"></div>

        <!-- Sección de direcciones -->
        <div>
            <div class="seccion-titulo">Mis direcciones</div>

            <?php if (empty($direcciones)): ?>
                <p class="text-muted">No tienes direcciones registradas.</p>
            <?php else: ?>
                <?php foreach ($direcciones as $dir): ?>
                    <div class="direccion-item" style="position: relative; padding-right: 90px;">

                        <p class="mb-1">
                            <strong><?= $dir['alias'] ?? 'Dirección' ?></strong>
                        </p>

                        <p class="mb-0">
                            <?= $dir['calle'] ?>,<br>
                            <?= $dir['distrito'] ?>, <?= $dir['provincia'] ?><br>
                            <?= $dir['pais'] ?>
                        </p>

                        <!-- BOTÓN ELIMINAR -->
                        <form action="index.php?controller=direccion&action=eliminar" 
                            method="POST" 
                            onsubmit="return confirm('¿Seguro que deseas eliminar esta dirección?');"
                            style="position:absolute; top:10px; right:10px;">
                            
                            <input type="hidden" name="id_direccion" value="<?= $dir['id_direccion'] ?>">

                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <a href="index.php?controller=direccion&action=crearDesdePerfil" class="btn btn-success btn-sm">
                Agregar dirección
            </a>
        </div>

        <div class="divider"></div>

        <!-- Cerrar sesión -->
        <div>
            <a href="index.php?controller=perfil&action=logout" class="btn btn-danger">
                Cerrar sesión
            </a>
        </div>

    </div>

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
