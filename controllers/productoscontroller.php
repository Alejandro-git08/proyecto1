<?php
require_once 'models/producto.php';

class productoscontroller {

    public function index() {
        if ($_SESSION['rol'] != 'admin') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $producto = new Producto();
        $productos = $producto->listar();
        require 'views/productos.php';
    }

    public function crear() {
        $categorias = [];
        require 'views/crear_producto.php';
    }

    public function guardar() {
        if (isset($_POST['nombre'], $_POST['precio'], $_POST['stock'], $_POST['id_categoria'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $id_categoria = $_POST['id_categoria'];

            $producto = new Producto();
            $producto->crear($nombre, $precio, $stock, $imagen, $descripcion, $id_categoria);

            header('Location: index.php?controller=productos&action=index');
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->eliminar($_GET['id']);
            header('Location: index.php?controller=productos&action=index');
        }
    }
}
