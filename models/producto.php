<?php
class Producto {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "ecommerce");
        if ($this->db->connect_error) {
            die("Error de conexión: " . $this->db->connect_error);
        }
    }

    public function listar() {
        $result = $this->db->query("SELECT * FROM Producto");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($nombre, $precio, $stock, $imagen, $descripcion, $id_categoria) {
        $stmt = $this->db->prepare("CALL crear_producto(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdssis", $nombre, $precio, $stock, $imagen, $descripcion, $id_categoria);
        $stmt->execute();
        $stmt->close();
    }

    public function eliminar($id_producto) {
        $stmt = $this->db->prepare("DELETE FROM Producto WHERE id_producto = ?");
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();
        $stmt->close();
    }
}

