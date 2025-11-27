<?php
require_once "models/producto.php";

class ProductosController {
    private $model;
    private $db;

    public function __construct($conexion){

        $this->model = new Producto($conexion);

        /*try {
            $this->db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8","root","");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("Error de conexión: " . $e->getMessage());
        }
        $this->model = new Producto($this->db);*/
    }

    public function verProductos(){
        $categorias = $this->model->listarCategorias(); 

        $id_buscar = $_GET['id_buscar'] ?? null;
        $categoria_buscar = $_GET['categoria_buscar'] ?? null;

        $productos = $this->model->listar(); 

        if($id_buscar){
            $productos = array_filter($productos, fn($p) => isset($p['id_producto']) && $p['id_producto'] == $id_buscar);
        }

        if($categoria_buscar){
            $productos = array_filter($productos, fn($p) => $p['categoria'] == $categoria_buscar);
        }

        require_once "views/admin/productos/productos_ver.php";
    }

    public function crear(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $nombreImagen = null;
            if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
                $carpetaDestino = "assets/img/productos/";
                if(!is_dir($carpetaDestino)){
                    mkdir($carpetaDestino, 0777, true);
                }

                $nombreArchivo = basename($_FILES['imagen']['name']);
                $rutaDestino = $carpetaDestino . $nombreArchivo;

                if(move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)){
                    $nombreImagen = $rutaDestino;
                }
            }

            $this->model->crear(
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['stock'],
                $nombreImagen,
                $_POST['descripcion'],
                $_POST['id_categoria']
            );

            header("Location: index.php?controller=productos&action=verProductos");
            exit;
        } else {
            $categorias = $this->model->listarCategorias();
            require_once "views/admin/productos/productos_crear.php";
        }
    }

    public function editar(){
        $id = $_GET['id'];
        $producto = $this->model->buscar($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->model->actualizar(
                $id,
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['stock'],
                $_POST['imagen'],
                $_POST['descripcion'],
                $_POST['id_categoria']
            );
            header("Location: index.php?controller=productos&action=verProductos");
            exit;
        } else {
            $categorias = $this->model->listarCategorias();
            require_once "views/admin/productos/productos_editar.php";
        }
    }

    public function eliminar(){
        $id = $_GET['id'];
        $this->model->eliminar($id);
        header("Location: index.php?controller=productos&action=verProductos");
        exit;
    }

}