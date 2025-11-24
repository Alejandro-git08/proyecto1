<?php
// views/editar_categoria.php
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php?controller=login&action=index');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Categoría</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container py-5">
    <h2>Editar Categoría</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la categoría</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $categoria['nombre'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="index.php?controller=categorias&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
