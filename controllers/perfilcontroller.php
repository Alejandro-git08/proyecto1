<?php
require_once "models/Usuario.php";
require_once "models/Direccion.php";

class perfilcontroller {

    private $conexion;
    private $usuarioModel;
    private $direccionModel;

    public function __construct($conexion) {
        $this->conexion = $conexion;

        // Modelos
        $this->usuarioModel = new Usuario();
        $this->direccionModel = new Direccion($conexion);
    }

    public function index() {
        // Verificar sesión
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_usuario = $_SESSION['id_usuario'];

        // Obtener datos del usuario
        $usuario = $this->usuarioModel->obtenerUsuario($id_usuario);

        // Obtener direcciones del usuario
        $direcciones = $this->direccionModel->listarPorUsuario($id_usuario);

        // Cargar vista
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

        $id = $_SESSION['id_usuario'];

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        $this->usuarioModel->actualizar(
            $id,
            "cliente", // solo versión cliente
            $nombre,
            $apellido,
            $email,
            $telefono
        );

        header("Location: index.php?controller=perfil&action=index");
    }

    public function logout() {
        session_start();   
        session_unset();
        session_destroy();

        // Borrar cookie de recordarme si existe
        if(isset($_COOKIE['usuario_logueado'])) {
            setcookie('usuario_logueado', '', time() - 3600, "/");
        }

        header("Location: index.php?controller=login&action=index");
        exit;
    }
}
