<?php
// views/home_admin.php
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php?controller=login&action=index');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel Admin - Tienda V</title>
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
    <!-- Header Admin -->
    <nav class="navbar navbar-expand-lg navbar-light shadow bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1" href="index.php">
                Admin Tienda V
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="admin_nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light" href="home_admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="productos_admin.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="categorias_admin.php">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="usuarios_admin.php">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Admin -->
    <section class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1 text-success">Panel de Administración</h1>
                <p>Gestiona productos, categorías y usuarios de tu tienda desde este panel.</p>
            </div>
        </div>

        <div class="row">
            <!-- Tarjeta Productos -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fa fa-box fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Agregar, editar o eliminar productos de la tienda.</p>
                        <a href="index.php?controller=productos&action=index" class="btn btn-success">Administrar</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Categorías -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fa fa-tags fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Categorías</h5>
                        <p class="card-text">Agregar o eliminar categorías para organizar productos.</p>
                        <a href="categorias_admin.php" class="btn btn-success">Administrar</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta Usuarios -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fa fa-users fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Ver, editar o eliminar cuentas de usuarios registrados.</p>
                        <a href="usuarios_admin.php" class="btn btn-success">Administrar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark mt-5">
        <div class="container py-3 text-light text-center">
            <p>&copy; 2025 Grupo #2 | Panel Admin - Tienda V</p>
        </div>
    </footer>

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
