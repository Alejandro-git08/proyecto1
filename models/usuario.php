<?php
require_once 'config/database.php';

class usuario {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("CALL login_usuario(:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); 
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($rol, $nombre, $apellido, $email, $contrasena, $telefono) {
        $stmt = $this->db->prepare("CALL crear_usuario(:rol, :nombre, :apellido, :email, :contrasena, :telefono)");
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();
    }

    // Nuevo método para obtener usuario por ID (para cookie)
    public function getById($id_usuario) {
        $stmt = $this->db->prepare("SELECT id_usuario, nombre, rol FROM Usuario WHERE id_usuario = :id");
        $stmt->bindParam(':id', $id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


