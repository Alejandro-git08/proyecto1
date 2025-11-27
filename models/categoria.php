<?php
class Categoria {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    // Listar categorías (para id 1 y 2)
    public function listar($genero = "todos") {
        $sql = "CALL listar_categorias()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $resultado = [];
        foreach($categorias as $row){
            if($row['id_categoria'] != 1 && $row['id_categoria'] != 2){
                if($genero == "todos" || $row['id_padre'] == $genero){
                    $resultado[] = $row;
                }
            }
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // Crear categoría
    public function crear($nombre, $id_padre) {
        $stmt = $this->db->prepare("CALL crear_categoria(:nombre, :id_padre)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_padre', $id_padre, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Buscar categoría por id
    public function buscar($id) {
        $stmt = $this->db->prepare("CALL buscar_categoria(:id)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $categoria;
    }

    // Actualizar categoría
    public function actualizar($id, $nombre, $id_padre) {
        $stmt = $this->db->prepare("CALL actualizar_categoria(:id, :nombre, :id_padre)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_padre', $id_padre, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Eliminar categoría
    public function eliminar($id) {
        $stmt = $this->db->prepare("CALL eliminar_categoria(:id)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Obtener productos por categoría
    public function obtenerProductos($id_categoria) {
        $stmt = $this->db->prepare("
            SELECT 
                p.id_producto,
                p.nombre_producto,
                p.precio,
                p.stock,
                p.imagen,
                p.descripcion_producto
            FROM Producto p
            WHERE p.id_categoria = :id_categoria
        ");
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $productos;
    }
}
?>
