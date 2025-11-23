<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="index.php?controller=login&action=autenticar" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Ingresar</button>
    </form>
    <p>¿No tienes cuenta? <a href="index.php?controller=login&action=registrar">Crear usuario</a></p>
</body>
</html>


