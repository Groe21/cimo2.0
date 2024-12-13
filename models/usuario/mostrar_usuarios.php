<?php
require_once '../../config/conexion.php';

class TablaUsuarios {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        return $this->conexion->obtenerDatos($sql);
    }

    public function mostrarTablaUsuarios() {
        $usuarios = $this->obtenerUsuarios();
        echo '<div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lista de Usuarios</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                        Crear
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
        if (empty($usuarios)) {
            echo '<tr><td colspan="4" class="text-center">No hay usuarios registrados.</td></tr>';
        } else {
            foreach ($usuarios as $usuario) {
                echo '<tr>
                        <td>' . htmlspecialchars($usuario['nombre']) . '</td>
                        <td>' . htmlspecialchars($usuario['apellido']) . '</td>
                        <td>' . htmlspecialchars($usuario['correo']) . '</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal"
                                    data-id="' . $usuario['id'] . '"
                                    data-nombre="' . htmlspecialchars($usuario['nombre']) . '"
                                    data-apellido="' . htmlspecialchars($usuario['apellido']) . '"
                                    data-correo="' . htmlspecialchars($usuario['correo']) . '">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal"
                                    data-id="' . $usuario['id'] . '">
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