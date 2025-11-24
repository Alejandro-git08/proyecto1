<?php
require_once "models/Categoria.php";

class CategoriasController {
    private $model;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        $this->model = new Categoria($this->db);
    }

    public function index() {
        $generoFiltro = $_GET['genero'] ?? "todos";
        $categorias = $this->model->listar($generoFiltro);
        require_once "views/admin/categorias/categorias_admin.php";
    }

    public function crear() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $id_padre = $_POST['id_padre'];
            $this->model->crear($nombre, $id_padre);
            header("Location: index.php?controller=categorias&action=index");
            exit;
        } else {
            require_once "views/admin/categorias/categorias_crear.php";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $categoria = $this->model->buscar($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $id_padre = $_POST['id_padre'];
            $this->model->actualizar($id, $nombre, $id_padre);
            header("Location: index.php?controller=categorias&action=index");
            exit;
        } else {
            require_once "views/admin/categorias/categorias_editar.php";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->model->eliminar($id);
        header("Location: index.php?controller=categorias&action=index");
        exit;
    }

    public function verProductos() {
        $id = $_GET['id'];
        $productos = $this->model->obtenerProductos($id);
        require_once "views/admin/categorias/categorias_productos.php";
    }
}


