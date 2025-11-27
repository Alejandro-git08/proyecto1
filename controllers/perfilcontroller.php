<?php
require_once "models/Usuario.php";
require_once "models/Direccion.php";

class perfilcontroller {

    private $usuarioModel;
    private $direccionModel;

    public function __construct($conexion) {

        $this->usuarioModel = new Usuario($conexion);
        $this->direccionModel = new Direccion($conexion);
    }

    public function index() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_usuario = $_SESSION['id_usuario'];

        $usuario = $this->usuarioModel->obtenerUsuario($id_usuario);

        $direcciones = $this->direccionModel->listarPorUsuario($id_usuario);

        require_once "views/users/perfil.php";
    }

    public function editar() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id = $_SESSION['id_usuario'];
        $usuario = $this->usuarioModel->obtenerUsuario($id);

        require_once "views/users/editar_perfil.php";
    }

    public function actualizar() {

        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?controller=perfil&action=index");
            exit;
        }

        $id = $_SESSION['id_usuario'];

        $nombre   = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $email    = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);

        $this->usuarioModel->actualizar(
            $id,
            "cliente", 
            $nombre,
            $apellido,
            $email,
            $telefono
        );

        header("Location: index.php?controller=perfil&action=index");
        exit;
    }

    public function logout() {
        session_start();   
        session_unset();
        session_destroy();

        if(isset($_COOKIE['usuario_logueado'])) {
            setcookie('usuario_logueado', '', time() - 3600, "/");
        }

        header("Location: index.php?controller=login&action=index");
        exit;
    }
}
