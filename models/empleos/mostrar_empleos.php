<?php
require_once '../../config/conexion.php';

class TablaEmpleos {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerEmpleos() {
        $sql = "SELECT * FROM empleos";
        return $this->conexion->obtenerDatos($sql);
    }

    public function mostrarTablaEmpleos() {
        $empleos = $this->obtenerEmpleos();
        echo '<div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lista de Empleos</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                        Crear
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Puesto</th>
                                <th>Ubicación</th>
                                <th>Descripción</th>
                                <th>Requisitos</th>
                                <th>Fecha de Publicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
        if (empty($empleos)) {
            echo '<tr><td colspan="6" class="text-center">No hay empleos registrados.</td></tr>';
        } else {
            foreach ($empleos as $empleo) {
                echo '<tr>
                        <td>' . htmlspecialchars($empleo['puesto']) . '</td>
                        <td>' . htmlspecialchars($empleo['ubicacion']) . '</td>
                        <td>' . htmlspecialchars($empleo['descripcion']) . '</td>
                        <td>' . htmlspecialchars($empleo['requisitos']) . '</td>
                        <td>' . htmlspecialchars($empleo['fecha_publicacion']) . '</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal"
                                    data-id="' . $empleo['id'] . '"
                                    data-puesto="' . htmlspecialchars($empleo['puesto']) . '"
                                    data-ubicacion="' . htmlspecialchars($empleo['ubicacion']) . '"
                                    data-descripcion="' . htmlspecialchars($empleo['descripcion']) . '"
                                    data-requisitos="' . htmlspecialchars($empleo['requisitos']) . '"
                                    data-fecha_publicacion="' . htmlspecialchars($empleo['fecha_publicacion']) . '">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal"
                                    data-id="' . $empleo['id'] . '">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                      </tr>';
            }
        }
        echo '          </tbody>
                    </table>
                </div>
              </div>';
    }
}
?>