<?php
class Producto {
    private $db;

    public function __construct($conexion){
        $this->db = $conexion;
    }
    /*
    // Listar productos
    public function listar(){
        $stmt = $this->db->prepare("CALL listar_productos()");
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $productos;
    }
    */
    // Crear producto
    public function crear($nombre, $precio, $stock, $imagen, $descripcion, $id_categoria){
        $stmt = $this->db->prepare("CALL crear_producto(:nombre, :precio, :stock, :imagen, :descripcion, :id_categoria)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Buscar producto
    public function buscar($id){
        $stmt = $this->db->prepare("CALL buscar_producto(:id)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $producto;
    }

    // Actualizar producto
    public function actualizar($id, $nombre, $precio, $stock, $imagen, $descripcion, $id_categoria){
        $stmt = $this->db->prepare("CALL actualizar_producto(:id, :nombre, :precio, :stock, :imagen, :descripcion, :id_categoria)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar producto
    public function eliminar($id){
        $stmt = $this->db->prepare("CALL eliminar_producto(:id)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Listar categorías
    public function listarCategorias($genero = "todos"){
        $stmt = $this->db->prepare("CALL listar_categorias()");
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $resultado = [];
        foreach($categorias as $cat){
            if($genero === "todos" || $cat['id_padre'] == $genero){
                $resultado[] = $cat;
            }
        }
        return $resultado;
    }

    public function listarUltimos5(){
        $stmt = $this->db->prepare("
            SELECT * 
            FROM producto
            ORDER BY id_producto DESC
            LIMIT 6
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar($genero = 'todos', $categoria = null){
        $stmt = $this->db->prepare("CALL listar_productos(:genero, :categoria)");
        $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);

        if($categoria === null){
            $stmt->bindValue(':categoria', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        }

        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $productos;
    }


}
