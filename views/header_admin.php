<?php
// views/header_admin.php
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: index.php?controller=login&action=index');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Tienda V</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1" href="index.php?controller=home&action=admin">Admin Tienda V</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#admin_nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="admin_nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=home&action=admin">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=productos&action=index">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=categorias&action=index">Categorías</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=usuarios&action=index">Usuarios</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>
