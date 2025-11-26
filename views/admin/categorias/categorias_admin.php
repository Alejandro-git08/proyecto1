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
    <title>Categorías - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <style>
        html, body {
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
    <!-- Header Admin -->
    <nav class="navbar navbar-expand-lg navbar-light shadow bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1" href="index.php?controller=home&action=index">
                Admin Tienda V
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="admin_nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=home&action=index">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=productos&action=verProductos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=categorias&action=index">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=usuarios&action=index">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

<main class="container py-5">

    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="h2 text-success">Categorías registradas</h1>
        </div>
    </div>

    <!-- Botón crear -->
    <div class="row mb-4">
        <div class="col text-end">
            <a href="index.php?controller=categorias&action=crear" class="btn btn-success">+ Crear categoría</a>
        </div>
    </div>

    <!-- FILTRO POR HOMBRE/MUJER -->
    <form method="GET" action="index.php" class="mb-4">
        <input type="hidden" name="controller" value="categorias">
        <input type="hidden" name="action" value="index">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label class="form-label fw-bold">Filtrar por género:</label>
            </div>
            <div class="col-md-3">
                <select name="genero" class="form-select">
                    <option value="todos" <?= ($generoFiltro=="todos")?"selected":"" ?>>Todos</option>
                    <option value="1" <?= ($generoFiltro=="1")?"selected":"" ?>>Hombre</option>
                    <option value="2" <?= ($generoFiltro=="2")?"selected":"" ?>>Mujer</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-success">Aplicar</button>
            </div>
        </div>
    </form>

    <!-- TABLA CATEGORÍAS -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $cat): ?>
                <tr>
                    <td><?= $cat['id_categoria'] ?></td>
                    <td><?= $cat['nombre_categoria'] ?></td>
                    <td><?= ($cat['id_padre']==1)?"Hombre":"Mujer" ?></td>
                    <td>
                        <a href="index.php?controller=categorias&action=editar&id=<?= $cat['id_categoria'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?controller=categorias&action=eliminar&id=<?= $cat['id_categoria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar categoría?')">Eliminar</a>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Botón regresar -->
    <div class="row mt-3">
        <div class="col text-start">
            <a href="index.php?controller=home&action=index" class="btn btn-secondary">Regresar</a>
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
