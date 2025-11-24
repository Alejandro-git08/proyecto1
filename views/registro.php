<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Tienda V</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center text-success mb-4">Crear cuenta</h3>
                        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                        <form action="index.php?controller=login&action=crear_usuario" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Crear cuenta</button>
                        </form>
                        <p class="text-center mt-3"><a href="index.php?controller=login&action=index" class="text-success">Volver al login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

