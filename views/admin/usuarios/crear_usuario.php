<?php
// Seguridad: solo admins
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php?controller=login&action=index');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario - Panel Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Formulario Usuario</span>
        <a href="index.php?controller=usuarios&action=index" class="btn btn-outline-light">Volver</a>
    </div>
</nav>

<div class="container mt-4">
    <h2>Crear nuevo usuario</h2>

    <form action="index.php?controller=usuarios&action=guardar" method="POST" class="mt-3 shadow p-4 bg-white rounded">

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" id="rol" class="form-select" required>
                <option value="cliente">Cliente</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono (opcional)</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar usuario</button>
        <a href="index.php?controller=usuarios&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<footer class="text-center mt-4 mb-3 text-muted">
    <small>Panel Admin © <?= date('Y') ?></small>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
