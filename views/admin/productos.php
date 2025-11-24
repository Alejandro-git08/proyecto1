<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <h1>Productos</h1>
        <a href="index.php?controller=productos&action=crear" class="btn btn-success mb-3">Agregar Producto</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= $p['id_producto'] ?></td>
                    <td><?= $p['nombre_producto'] ?></td>
                    <td><?= $p['precio'] ?></td>
                    <td><?= $p['stock'] ?></td>
                    <td>
                        <a href="index.php?controller=productos&action=eliminar&id=<?= $p['id_producto'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php?controller=home&action=index" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
