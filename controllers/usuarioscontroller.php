<?php
class UsuariosController {

    private $usuarioModel;

   public function __construct($conexion) {
        require_once "models/Usuario.php";
        $this->usuarioModel = new Usuario($conexion);
    } 

    public function index() {
        $rolFiltro = isset($_GET['rol']) ? $_GET['rol'] : "todos";

        if ($rolFiltro === "todos") {
            $usuarios = $this->usuarioModel->listarUsuarios();
        } else {
            $usuarios = $this->usuarioModel->filtrarPorRol($rolFiltro);
        }

        require_once "views/admin/usuarios/usuarios_admin.php";
    }

    public function crear() {
        require_once "views/admin/usuarios/crear_usuario.php";
    }

    public function guardar() {
        $rol = $_POST['rol'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

        $this->usuarioModel->crear($rol, $nombre, $apellido, $email, $contrasena, $telefono);
        header("Location: index.php?controller=usuarios&action=index");
    }

    public function editar() {
        $id = $_GET['id'];
        $usuario = $this->usuarioModel->obtenerUsuario($id);
        require_once "views/admin/usuarios/editar_usuario.php";
    }

    public function actualizar() {
        $id = $_POST['id_usuario'];
        $rol = $_POST['rol'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        $this->usuarioModel->actualizar($id, $rol, $nombre, $apellido, $email, $telefono);
        header("Location: index.php?controller=usuarios&action=index");
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->usuarioModel->eliminar($id);
        header("Location: index.php?controller=usuarios&action=index");
    }

}


