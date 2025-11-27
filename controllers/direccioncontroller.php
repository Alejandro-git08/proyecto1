<?php
require_once "models/Direccion.php";

class DireccionController {
    private $conexion;
    private $direccionModel;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        $this->direccionModel = new Direccion($conexion);
    }

    // Listar direcciones de un usuario para seleccionar antes de comprar
    public function seleccionar() {
        if(!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $direcciones = $this->direccionModel->listarPorUsuario($id_usuario);

        require_once "views/users/seleccionar_direccion.php";
    }

    public function crear() {
        require_once "views/users/agregar_direccion.php";
    }

    public function guardar() {
        if(!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $pais = $_POST['pais'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $calle = $_POST['calle'];
        $codigo_postal = $_POST['codigo_postal'];
        $detalles = $_POST['detalles_direccion'];

        $this->direccionModel->crear($id_usuario, $pais, $provincia, $distrito, $calle, $codigo_postal, $detalles);

        header("Location: index.php?controller=cliente&action=seleccionarDireccion");
        exit;
    }

    public function guardarDesdePerfil() {
        if(!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        $id_usuario = $_SESSION['id_usuario'];
        $pais = $_POST['pais'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $calle = $_POST['calle'];
        $codigo_postal = $_POST['codigo_postal'];
        $detalles = $_POST['detalles_direccion'];

        $this->direccionModel->crear($id_usuario, $pais, $provincia, $distrito, $calle, $codigo_postal, $detalles);

        header("Location: index.php?controller=perfil&action=index");
        exit;
    }

    public function crearDesdePerfil() {
        require_once "views/users/agregar_direccion_perfil.php";
    }

    public function eliminar()
    {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit();
        }

        if (isset($_POST['id_direccion'])) {
            $idDireccion = $_POST['id_direccion'];

            $this->direccionModel->eliminarPorId($idDireccion);
        }

        header("Location: index.php?controller=perfil&action=index");
        exit();
    }


}
