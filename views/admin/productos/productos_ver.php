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
    <title>Productos - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
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

<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-success">Productos</h2>
        <a href="index.php?controller=productos&action=crear" class="btn btn-success">+ Crear producto</a>
    </div>

        <!-- Formulario de filtro -->
    <form method="GET" class="row g-3 mb-3">
        <input type="hidden" name="controller" value="productos">
        <input type="hidden" name="action" value="verProductos">

        <div class="col-auto">
            <label>ID:</label>
            <input type="number" name="id_buscar" class="form-control" placeholder="Buscar por ID" value="<?= $_GET['id_buscar'] ?? '' ?>">
        </div>

        <div class="col-auto">
            <label>Categoría:</label>
            <select name="categoria_buscar" class="form-select">
                <option value="">Todas</option>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['nombre_categoria'] ?>" 
                        <?= (isset($_GET['categoria_buscar']) && $_GET['categoria_buscar']==$cat['nombre_categoria'])?'selected':'' ?>>
                        <?= $cat['nombre_categoria'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $prod): ?>
            <tr>
                <td><?= $prod['id_producto'] ?></td>
                <td>
                    <?php if($prod['imagen']): ?>
                        <img src="<?= $prod['imagen'] ?>" alt="<?= $prod['nombre_producto'] ?>" width="80">
                    <?php else: ?>
                        Sin imagen
                    <?php endif; ?>
                </td>
                <td><?= $prod['nombre_producto'] ?></td>
                <td>$<?= $prod['precio'] ?></td>
                <td><?= $prod['stock'] ?></td>
                <td><?= $prod['categoria'] ?></td>
                <td>
                    <a href="index.php?controller=productos&action=editar&id=<?= $prod['id_producto'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?controller=productos&action=eliminar&id=<?= $prod['id_producto'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?controller=home&action=index" class="btn btn-secondary mt-3">Regresar</a>
</main>

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
