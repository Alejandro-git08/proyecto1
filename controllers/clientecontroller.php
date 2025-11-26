<?php
require_once 'models/Producto.php';
require_once 'models/Carrito.php';
require_once 'controllers/direccioncontroller.php';

class ClienteController {
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion; // objeto PDO
    }

    // Mostrar todos los productos
    public function verProductos() {
        $productoModel = new Producto($this->conexion);
        $productos = $productoModel->listar();
        require 'views/users/tienda.php';
    }

    // Agregar producto al carrito
    public function agregarAlCarrito() {
        if(!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'] ?? 1;

        $carritoModel = new Carrito($this->conexion);
        $carritoModel->agregar($_SESSION['id_usuario'], $id_producto, $cantidad);

        header("Location: index.php?controller=cliente&action=verCarrito");
        exit;
    }

    // Ver carrito
    public function verCarrito() {
        if(!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $carritoModel = new Carrito($this->conexion);
        $productos = $carritoModel->listar($_SESSION['id_usuario']);
        require 'views/users/carrito.php';
    }

    // Eliminar producto del carrito
    public function eliminarDelCarrito() {
        if(!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_producto = $_GET['id_producto'] ?? null;
        if($id_producto) {
            $carritoModel = new Carrito($this->conexion);
            $carritoModel->eliminar($_SESSION['id_usuario'], $id_producto);
        }

        header("Location: index.php?controller=cliente&action=verCarrito");
        exit;
    }

    // Mostrar direcciones para elegir antes de comprar
    public function seleccionarDireccion() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $direccionController = new DireccionController($this->conexion);
        $direccionController->seleccionar();
    }

    // Comprar carrito con dirección seleccionada
    public function comprarCarrito() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_direccion = $_POST['id_direccion'] ?? null;
        $metodo_pago = $_POST['metodo_pago'] ?? 'simulado';

        if (!$id_direccion) {
            header("Location: index.php?controller=cliente&action=seleccionarDireccion");
            exit;
        }

        $carritoModel = new Carrito($this->conexion);
        try {
            $carritoModel->comprarCarrito($_SESSION['id_usuario'], $id_direccion, $metodo_pago);
            $mensaje = "¡Compra realizada con éxito!";
        } catch (Exception $e) {
            $mensaje = "Error: " . $e->getMessage();
        }

        require 'views/users/confirmacion.php';
    }

    public function verPedidos() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $carritoModel = new Carrito($this->conexion);
        $pedidos = $carritoModel->obtenerPedidos($id_usuario);

        require 'views/users/pedidos.php';
    }

    public function home() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        // Contar productos en carrito
        $carritoModel = new Carrito($this->conexion);
        $contadorCarrito = $carritoModel->contar($_SESSION['id_usuario']);

        // Traer productos destacados (opcional)
        $productoModel = new Producto($this->conexion);
        $productos = $productoModel->listar();

        // Cargar vista
        require 'views/users/home.php';
    }


}
