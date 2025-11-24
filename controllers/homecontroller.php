<?php
require_once 'models/usuario.php';

class homecontroller {

    public function index() {

        if (!isset($_SESSION['id_usuario']) && isset($_COOKIE['usuario_logueado'])) {
            $usuarioModel = new usuario();
            $user = $usuarioModel->getById($_COOKIE['usuario_logueado']);
            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];
            }
        }

        // Si no hay sesión, redirigir al login
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Redirigir según rol
        if ($_SESSION['rol'] == 'admin') {
            require __DIR__ . '/../views/admin/home_admin.php';
        } else {
            require __DIR__ . '/../views/users/home.php';
        }
    }
}

