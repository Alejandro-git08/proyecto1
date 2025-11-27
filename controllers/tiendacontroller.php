<?php
require_once __DIR__ . "/../models/producto.php";
require_once __DIR__ . "/../models/carrito.php";
require_once __DIR__ . "/../config/database.php";

class TiendaController {
    private $productoModel;
    private $carritoModel;

    public function __construct($conexion) {
        /*$db = new Database();
        $conexion = $db->getConnection();*/

        $this->productoModel = new Producto($conexion);
        $this->carritoModel = new Carrito($conexion);
    }

    public function index() {

        $genero = $_GET['genero'] ?? 'todos';      
        $categoria = $_GET['categoria'] ?? null; 
        if ($categoria === '') $categoria = null;  

        $productos = $this->productoModel->listar($genero, $categoria);

        $categoriasHombre = $this->productoModel->listarCategorias(1); // id_padre = 1
        $categoriasMujer  = $this->productoModel->listarCategorias(2); // id_padre = 2

        require "views/users/tienda.php";
    }

    public function agregarAlCarrito() {
        if (!isset($_SESSION['id_usuario'])) {
            echo "Debes iniciar sesión para agregar al carrito.";
            exit;
        }

        if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
            $id_producto = $_POST['id_producto'];
            $cantidad = $_POST['cantidad'];
            $id_usuario = $_SESSION['id_usuario'];

            $this->carritoModel->agregar($id_usuario, $id_producto, $cantidad);

            header("Location: index.php?controller=tienda&action=index");
            exit;
        }
    }
}
