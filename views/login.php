<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tienda V</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center text-success mb-4">Iniciar sesión</h3>
                        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                        <form action="index.php?controller=login&action=autenticar" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="recordarme" name="recordarme">
                                <label class="form-check-label" for="recordarme">Recordarme</label>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Ingresar</button>
                        </form>
                        <p class="text-center mt-3">¿No tienes cuenta? <a href="index.php?controller=login&action=registrar" class="text-success">Crear usuario</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


