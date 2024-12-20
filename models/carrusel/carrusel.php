<?php
require_once __DIR__ . '/../../config/config.php';

require_once __DIR__ . '/../../config/conexion.php';

class Carrusel {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerImagenes() {
        $sql = "SELECT * FROM carrusel";
        return $this->conexion->obtenerDatos($sql);
    }

    public function agregarImagen($imagen) {
        $sql = "INSERT INTO carrusel (imagen) VALUES (?)";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("s", $imagen);
        return $stmt->execute();
    }

    public function actualizarImagen($id, $imagen) {
        $sql = "UPDATE carrusel SET imagen = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("si", $imagen, $id);
        return $stmt->execute();
    }

    public function eliminarImagen($id) {
        $sql = "DELETE FROM carrusel WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>