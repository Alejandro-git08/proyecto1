<?php
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php?controller=login&action=index');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Categoría - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>

<!-- Header Admin -->
<nav class="navbar navbar-expand-lg navbar-light shadow bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1" href="index.php?controller=home&action=index">Admin Tienda V</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="admin_nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=home&action=index">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="index.php?controller=categorias&action=index">Categorías</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="h2 text-success">Crear nueva categoría</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="index.php?controller=categorias&action=crear">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre de la categoría:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Género:</label>
                    <select name="id_padre" class="form-select" required>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Crear categoría</button>
                    <a href="index.php?controller=categorias&action=index" class="btn btn-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-dark mt-5">
    <div class="container py-3 text-light text-center">
        <p>&copy; <?= date('Y') ?> Admin Tienda V</p>
    </div>
</footer>

<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
</body>

</html>

