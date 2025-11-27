<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Tienda V</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
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
                    <li class="nav-item"><a class="nav-link active" href="#">Editar Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">

                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center text-success mb-4">
                            Editar Perfil
                        </h3>

                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <form action="index.php?controller=perfil&action=actualizar" method="POST">

                            <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">

                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre"
                                       value="<?= $usuario['nombre'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido"
                                       value="<?= $usuario['apellido'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"
                                       value="<?= $usuario['email'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono"
                                       value="<?= $usuario['telefono'] ?>">
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Guardar Cambios
                            </button>
                        </form>

                        <p class="text-center mt-3">
                            <a href="index.php?controller=perfil&action=index" class="text-success">
                                Volver al perfil
                            </a>
                        </p>

                    </div>
                </div>

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
