<?php
require_once 'models/usuario.php';

class homecontroller {

    public function index() {

        // Si no hay sesión, redirigir al login
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Redirigir según rol
        if ($_SESSION['rol'] == 'admin') {
            require 'views/home_admin.php';
        } else {
            require 'views/home.php';
        }
    }
}

