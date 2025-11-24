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
    <title>Productos por Categoría - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="text-success">Productos en la categoría: <?= $categoria_nombre ?></h2>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $prod): ?>
            <tr>
                <td><?= $prod['id_producto'] ?></td>
                <td><?= $prod['nombre_producto'] ?></td>
                <td><?= $prod['precio'] ?></td>
                <td><?= $prod['stock'] ?></td>
                <td>
                    <a href="index.php?controller=productos&action=editar&id=<?= $prod['id_producto'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?controller=productos&action=eliminar&id=<?= $prod['id_producto'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php?controller=categorias&action=index" class="btn btn-secondary mt-3">Regresar</a>
</div>

<footer class="bg-dark text-light text-center py-2 mt-5">
    &copy; <?= date('Y') ?> Admin Tienda V
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
