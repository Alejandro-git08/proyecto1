<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
</head>
<body>
    <h2>Registro</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="index.php?controller=login&action=crear_usuario" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        <label>Apellido:</label>
        <input type="text" name="apellido" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono"><br><br>
        <button type="submit">Crear cuenta</button>
    </form>
    <p><a href="index.php?controller=login&action=index">Volver al login</a></p>
</body>
</html>

