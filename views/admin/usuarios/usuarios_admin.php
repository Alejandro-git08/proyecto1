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
    <title>Usuarios - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        /* Asegura que el footer siempre quede abajo */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-success" href="index.php?controller=home&action=index">Admin Tienda V</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=home&action=index">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-light fw-bold" href="index.php?controller=usuarios&action=index">Usuarios</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>

<div class="container py-4 content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-success">Usuarios registrados</h2>
        <a href="index.php?controller=usuarios&action=crear" class="btn btn-success">+ Crear usuario</a>
    </div>

    <!-- FILTRO -->
    <form method="GET" action="index.php" class="mb-3">
        <input type="hidden" name="controller" value="usuarios">
        <input type="hidden" name="action" value="index">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label class="form-label fw-bold">Filtrar por rol:</label>
            </div>
            <div class="col-md-3">
                <select name="rol" class="form-select">
                    <option value="todos" <?= ($rolFiltro=="todos")?"selected":"" ?>>Todos</option>
                    <option value="admin" <?= ($rolFiltro=="admin")?"selected":"" ?>>Admins</option>
                    <option value="cliente" <?= ($rolFiltro=="cliente")?"selected":"" ?>>Clientes</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-success">Aplicar</button>
            </div>
        </div>
    </form>

    <!-- TABLA -->
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $user): ?>
            <tr>
                <td><?= $user['id_usuario'] ?></td>
                <td><?= ucfirst($user['rol']) ?></td>
                <td><?= $user['nombre'] ?></td>
                <td><?= $user['apellido'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['telefono'] ?: '-' ?></td>
                <td>
                    <a href="index.php?controller=usuarios&action=editar&id=<?= $user['id_usuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?controller=usuarios&action=eliminar&id=<?= $user['id_usuario'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer class="bg-dark text-light text-center py-3 mt-auto">
    &copy; <?= date('Y') ?> Admin Tienda V
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

