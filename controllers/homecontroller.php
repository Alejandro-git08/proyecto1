<?php
require_once 'models/usuario.php';
require_once 'models/producto.php';
require_once 'models/Carrito.php';
require_once 'config/database.php'; 

class homecontroller {

    private $conexion;
    private $usuarioModel;
    private $productoModel;
    private $carritoModel;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        $this->usuarioModel = new Usuario($conexion);
        $this->productoModel = new Producto($conexion);
        $this->carritoModel = new Carrito($conexion);
    }

    public function index() {

        if (!isset($_SESSION['id_usuario']) && isset($_COOKIE['usuario_logueado'])) {

            $user = $this->usuarioModel->getById($_COOKIE['usuario_logueado']);
            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];
            }
        }

        if (!isset($_SESSION['id_usuario'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $contadorCarrito = $this->carritoModel->contar($_SESSION['id_usuario']);

        $productos = $this->productoModel->listarUltimos5();

        if ($_SESSION['rol'] == 'admin') {
            require __DIR__ . '/../views/admin/home_admin.php';
        } else {
            require __DIR__ . '/../views/users/home.php';
        }
    }

    
    public function about() {
        require __DIR__ . '/../views/users/about.php';
    }
}

