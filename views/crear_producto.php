<?php
// views/crear_producto.php
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php?controller=login&action=index');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Producto - Tienda V</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <a class="navbar-brand text-success logo h1" href="index.php?controller=home&action=home_admin">
                Admin Tienda V
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="admin_nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=home&action=home_admin">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=productos&action=index">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=categorias&action=index">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=usuarios&action=index">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=login&action=cerrar_sesion">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario Agregar Producto -->
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="h2 text-success mb-4">Agregar Nuevo Producto</h2>
                <form action="index.php?controller=productos&action=guardar" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-select" id="categoria" name="categoria_id" required>
                            <option value="">Selecciona una categoría</option>
                            <?php
                            // Mostrar las categorías desde la base de datos
                            if (isset($categorias)) {
                                foreach ($categorias as $cat) {
                                    echo "<option value='{$cat['id']}'>{$cat['nombre']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen del Producto</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success">Guardar Producto</button>
                    <a href="index.php?controller=productos&action=index" class="btn btn-secondary">Cancelar</a>
                </form>
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
