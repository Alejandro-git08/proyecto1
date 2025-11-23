<?php
class usuario {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "ecommerce");
        if ($this->db->connect_error) {
            die("Error de conexión: " . $this->db->connect_error);
        }
    }

    // Login usando procedimiento almacenado
    public function login($email, $password) {
        $stmt = $this->db->prepare("CALL login_usuario(?, ?)");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    // Crear usuario usando procedimiento almacenado
    public function crear($rol, $nombre, $apellido, $email, $contrasena, $telefono) {
        $stmt = $this->db->prepare("CALL crear_usuario(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $rol, $nombre, $apellido, $email, $contrasena, $telefono);
        $stmt->execute();
        $stmt->close();
    }
}


