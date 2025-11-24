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
    <title>Crear Producto - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1" href="index.php?controller=home&action=index">Admin Tienda V</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="admin_nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=home&action=index">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="index.php?controller=productos&action=verProductos">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=categorias&action=index">Categorías</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    <h2 class="text-success mb-4">Crear nuevo producto</h2>

    <form method="POST" action="index.php?controller=productos&action=crear" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nombre del producto:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio:</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen del producto:</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría:</label>
            <select name="id_categoria" class="form-select" required>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['id_categoria'] ?>">
                        <?= $cat['nombre_categoria'] ?> (<?= $cat['id_padre']==1?'Hombre':'Mujer' ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear producto</button>
        <a href="index.php?controller=productos&action=verProductos" class="btn btn-secondary">Regresar</a>
    </form>
</div>

<footer class="bg-dark mt-5">
    <div class="container py-3 text-light text-center">
        &copy; <?= date('Y') ?> Admin Tienda V
    </div>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
