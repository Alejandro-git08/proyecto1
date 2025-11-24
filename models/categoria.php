<?php
// models/categoria.php
require_once 'config/database.php';

class Categoria {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM categoria WHERE id = ?");
    $stmt->execute([$id]); // PASAMOS EL PARÁMETRO EN UN ARRAY
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre) {
        $stmt = $this->conn->prepare("INSERT INTO categoria(nombre) VALUES(?)");
        return $stmt->execute([$nombre]); // PASAMOS EL PARÁMETRO EN UN ARRAY
    }

    public function update($id, $nombre) {
        $stmt = $this->conn->prepare("UPDATE categoria SET nombre=? WHERE id=?");
        return $stmt->execute([$nombre, $id]); // PASAMOS LOS PARÁMETROS EN ORDEN
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM categoria WHERE id=?");
        return $stmt->execute([$id]); // PASAMOS EL PARÁMETRO EN UN ARRAY
    }

}
?>
