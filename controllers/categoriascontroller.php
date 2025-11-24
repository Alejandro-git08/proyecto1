<?php
// controllers/categoriascontroller.php
require_once 'models/categoria.php';

class CategoriasController {
    private $categoria;

    public function __construct() {
        $this->categoria = new Categoria();
        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'admin') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }
    }

    public function index() {
        $categorias = $this->categoria->getAll();
        require 'views/categorias_admin.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $this->categoria->create($nombre);
            header('Location: index.php?controller=categorias&action=index');
            exit;
        }
        require 'views/crear_categoria.php';
    }

    public function editar() {
        $id = $_GET['id'];
        $categoria = $this->categoria->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $this->categoria->update($id, $nombre);
            header('Location: index.php?controller=categorias&action=index');
            exit;
        }

        require 'views/editar_categoria.php';
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->categoria->delete($id);
        header('Location: index.php?controller=categorias&action=index');
        exit;
    }
}
?>
