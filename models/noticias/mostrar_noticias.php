<?php
require_once '../../config/conexion.php';

class TablaNoticias {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerNoticias() {
        $sql = "SELECT * FROM noticias";
        return $this->conexion->obtenerDatos($sql);
    }

    public function mostrarTablaNoticias() {
        $noticias = $this->obtenerNoticias();
        echo '<div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lista de Noticias</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                        Crear
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
        if (empty($noticias)) {
            echo '<tr><td colspan="5" class="text-center">No hay noticias registradas.</td></tr>';
        } else {
            foreach ($noticias as $noticia) {
                echo '<tr>
                        <td><img src="' . htmlspecialchars($noticia['foto']) . '" alt="Foto" width="100"></td>
                        <td>' . htmlspecialchars($noticia['titulo']) . '</td>
                        <td>' . htmlspecialchars($noticia['descripcion']) . '</td>
                        <td>' . htmlspecialchars($noticia['fecha']) . '</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal"
                                    data-id="' . $noticia['id'] . '"
                                    data-foto="' . htmlspecialchars($noticia['foto']) . '"
                                    data-titulo="' . htmlspecialchars($noticia['titulo']) . '"
                                    data-descripcion="' . htmlspecialchars($noticia['descripcion']) . '"
                                    data-fecha="' . htmlspecialchars($noticia['fecha']) . '">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal"
                                    data-id="' . $noticia['id'] . '">
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