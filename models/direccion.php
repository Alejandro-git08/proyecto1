<?php
class Direccion {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function crear($id_usuario, $pais, $provincia, $distrito, $calle, $codigo_postal, $detalles) {
        $sql = "INSERT INTO Direccion (id_usuario, pais, provincia, distrito, calle, codigo_postal, detalles_direccion)
                VALUES (:id_usuario, :pais, :provincia, :distrito, :calle, :codigo_postal, :detalles)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            'id_usuario' => $id_usuario,
            'pais' => $pais,
            'provincia' => $provincia,
            'distrito' => $distrito,
            'calle' => $calle,
            'codigo_postal' => $codigo_postal,
            'detalles' => $detalles
        ]);
    }

    public function listarPorUsuario($id_usuario){
        $sql = "SELECT * FROM Direccion WHERE id_usuario = :id_usuario";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['id_usuario' => $id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarPorId($id)
    {
        $stmt = $this->conexion->prepare("DELETE FROM Direccion WHERE id_direccion = ?");
        return $stmt->execute([$id]);
    }

}
