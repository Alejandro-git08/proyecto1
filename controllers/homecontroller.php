<?php
require_once 'models/usuario.php';
require_once 'models/producto.php';
require_once 'models/Carrito.php';
require_once 'config/database.php'; 

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

        //Se supone que carga los productos
        $db = new Database();
        $conexion = $db->getConnection();

        // Contador de carrito para el nav
        $contadorCarrito = 0;
        if(isset($_SESSION['id_usuario'])){
            $carritoModel = new Carrito($conexion);
            $contadorCarrito = $carritoModel->contar($_SESSION['id_usuario']);
        }

        $productoModel = new Producto($conexion);
        $productos = $productoModel->listarUltimos5();


        // Redirigir según rol
        if ($_SESSION['rol'] == 'admin') {
            require __DIR__ . '/../views/admin/home_admin.php';
        } else {
            require __DIR__ . '/../views/users/home.php';
        }
    }

    
    public function about() {
        // Cargar la vista sobre nosotros
        require __DIR__ . '/../views/users/about.php';
    }
}

