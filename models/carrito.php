<?php
class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerIdCarrito($id_usuario) {
        $stmt = $this->conexion->prepare("SELECT id_carrito FROM Carrito WHERE id_usuario = :id_usuario");
        $stmt->execute([':id_usuario' => $id_usuario]);
        $carrito = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($carrito) {
            return $carrito['id_carrito'];
        } else {
            $stmt = $this->conexion->prepare("INSERT INTO Carrito (id_usuario) VALUES (:id_usuario)");
            $stmt->execute([':id_usuario' => $id_usuario]);
            return $this->conexion->lastInsertId();
        }
    }

    public function agregar($id_usuario, $id_producto, $cantidad = 1) {
        $id_carrito = $this->obtenerIdCarrito($id_usuario);

        $stmt = $this->conexion->prepare("SELECT cantidad FROM Carrito_Producto WHERE id_carrito = :id_carrito AND id_producto = :id_producto");
        $stmt->execute([':id_carrito' => $id_carrito, ':id_producto' => $id_producto]);
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existe) {
            $stmt = $this->conexion->prepare("UPDATE Carrito_Producto SET cantidad = cantidad + :cantidad WHERE id_carrito = :id_carrito AND id_producto = :id_producto");
            $stmt->execute([':cantidad' => $cantidad, ':id_carrito' => $id_carrito, ':id_producto' => $id_producto]);
        } else {
            $stmt = $this->conexion->prepare("INSERT INTO Carrito_Producto (id_carrito, id_producto, cantidad) VALUES (:id_carrito, :id_producto, :cantidad)");
            $stmt->execute([':id_carrito' => $id_carrito, ':id_producto' => $id_producto, ':cantidad' => $cantidad]);
        }
    }

    public function listar($id_usuario) {
        $id_carrito = $this->obtenerIdCarrito($id_usuario);

        $stmt = $this->conexion->prepare("
            SELECT cp.id_producto, cp.cantidad, p.nombre_producto, p.precio, p.imagen, p.descripcion_producto, p.stock
            FROM Carrito_Producto cp
            INNER JOIN Producto p ON cp.id_producto = p.id_producto
            WHERE cp.id_carrito = :id_carrito
        ");
        $stmt->execute([':id_carrito' => $id_carrito]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id_usuario, $id_producto) {
        $id_carrito = $this->obtenerIdCarrito($id_usuario);
        $stmt = $this->conexion->prepare("DELETE FROM Carrito_Producto WHERE id_carrito = :id_carrito AND id_producto = :id_producto");
        $stmt->execute([':id_carrito' => $id_carrito, ':id_producto' => $id_producto]);
    }

    public function vaciar($id_usuario) {
        $id_carrito = $this->obtenerIdCarrito($id_usuario);
        $stmt = $this->conexion->prepare("DELETE FROM Carrito_Producto WHERE id_carrito = :id_carrito");
        $stmt->execute([':id_carrito' => $id_carrito]);
    }

    public function contar($idUsuario)
    {
        // Obtener el ID del carrito del usuario
        $stmt = $this->conexion->prepare("
            SELECT id_carrito 
            FROM Carrito 
            WHERE id_usuario = ?
        ");
        $stmt->execute([$idUsuario]);
        $carrito = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si el usuario no tiene carrito, retorna 0
        if (!$carrito) {
            return 0;
        }

        $idCarrito = $carrito['id_carrito'];

        // Contar la cantidad total de productos dentro del carrito
        $stmt = $this->conexion->prepare("
            SELECT SUM(cantidad) AS total
            FROM Carrito_Producto
            WHERE id_carrito = ?
        ");
        $stmt->execute([$idCarrito]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'] ?? 0;
    }

 // Comprar carrito con procedimiento almacenado
    public function comprarCarrito($id_usuario, $id_direccion, $metodo_pago = 'simulado') {
        try {
            $stmt = $this->conexion->prepare("CALL comprar_carrito(:id_usuario, :metodo_pago, :id_direccion)");
            $stmt->execute([
                'id_usuario' => $id_usuario,
                'metodo_pago' => $metodo_pago,
                'id_direccion' => $id_direccion
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error al realizar la compra: " . $e->getMessage());
        }
    }

    public function obtenerPedidos($id_usuario) {
        $stmt = $this->conexion->prepare("CALL ver_pedidos_usuario(:id_usuario)");
        $stmt->execute(['id_usuario' => $id_usuario]);

        // Primer result set: órdenes
        $ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Siguiente result set: productos
        $stmt->nextRowset();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Organizar productos por id_orden
        $detalle_por_orden = [];
        foreach ($productos as $prod) {
            $detalle_por_orden[$prod['id_orden']][] = $prod;
        }

        return ['ordenes' => $ordenes, 'detalle' => $detalle_por_orden];
    }

}
