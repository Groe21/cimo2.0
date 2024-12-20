<?php
// Incluir el archivo de configuración global
require_once __DIR__ . '/../../config/config.php';

// Incluir el archivo de conexión usando __DIR__
require_once __DIR__ . '/../../config/conexion.php';

class TablaAplicaciones {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerAplicaciones() {
        $sql = "SELECT a.id, e.Puesto, a.nombre_candidato, a.email, a.telefono, a.cv_url, a.fecha_aplicacion 
                FROM aplicar_empleo a 
                JOIN empleos e ON a.empleo_id = e.id";
        return $this->conexion->obtenerDatos($sql);
    }

    public function mostrarTablaAplicaciones() {
        $aplicaciones = $this->obtenerAplicaciones();
        echo '<div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lista de Aplicaciones</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Puesto</th>
                                <th>Nombre del Candidato</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>CV</th>
                                <th>Fecha de Aplicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
        if (empty($aplicaciones)) {
            echo '<tr><td colspan="7" class="text-center">No hay aplicaciones registradas.</td></tr>';
        } else {
            foreach ($aplicaciones as $aplicacion) {
                echo '<tr>
                        <td>' . htmlspecialchars($aplicacion['Puesto']) . '</td>
                        <td>' . htmlspecialchars($aplicacion['nombre_candidato']) . '</td>
                        <td>' . htmlspecialchars($aplicacion['email']) . '</td>
                        <td>' . htmlspecialchars($aplicacion['telefono']) . '</td>
                        <td><a href="' . htmlspecialchars($aplicacion['cv_url']) . '" target="_blank">Ver CV</a></td>
                        <td>' . htmlspecialchars($aplicacion['fecha_aplicacion']) . '</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal"
                                    data-id="' . $aplicacion['id'] . '">
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

    public function obtenerAplicacionesPrincipal() {
        $sql = "SELECT id, Puesto, ubicacion, descripcion, requisitos, fecha_publicacion FROM empleos";
        return $this->conexion->obtenerDatos($sql);
    }

    public function mostrarAplicacionesPrincipal() {
        $empleos = $this->obtenerAplicacionesPrincipal();
        echo '<div class="row">';
        if (empty($empleos)) {
            echo '<div class="col-12 text-center">No hay vacantes disponibles.</div>';
        } else {
            foreach ($empleos as $empleo) {
                echo '<div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($empleo['Puesto']) . '</h5>
                                <h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($empleo['ubicacion']) . '</h6>
                                <p class="card-text">' . htmlspecialchars($empleo['descripcion']) . '</p>
                                <p class="card-text"><strong>Requisitos:</strong> ' . htmlspecialchars($empleo['requisitos']) . '</p>
                                <p class="card-text"><small class="text-muted">Publicado el ' . htmlspecialchars($empleo['fecha_publicacion']) . '</small></p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aplicarModal"
                                        data-id="' . $empleo['id'] . '"
                                        data-puesto="' . htmlspecialchars($empleo['Puesto']) . '">
                                    Aplicar
                                </button>
                            </div>
                        </div>
                      </div>';
            }
        }
        echo '</div>';
    }

    public function mostrarAplicacionesMiniCard() {
        $empleos = $this->obtenerAplicacionesPrincipal();
        echo '<div class="row">';
        if (empty($empleos)) {
            echo '<div class="col-12 text-center">No hay vacantes disponibles.</div>';
        } else {
            foreach ($empleos as $empleo) {
                echo '<div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h5">' . htmlspecialchars($empleo['Puesto']) . '</h2>
                        <p class="mb-0">' . htmlspecialchars(substr($empleo['descripcion'], 0, 100)) . '... <a href="' . BASE_URL . '/view/aplicaciones/aplicar_bacante.php?id=' . $empleo['id'] . '&puesto=' . urlencode($empleo['Puesto']) . '">Ver más</a></p>
                      </div>';
            }
        }
        echo '</div>';
    }
}
?>