<?php

require_once __DIR__ . '/../../config/config.php';

require_once __DIR__ . '/../../config/conexion.php';

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
                        <td><img src="' . BASE_URL . '/' . htmlspecialchars($noticia['foto']) . '" alt="Foto" width="100"></td>
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

    public function mostrarNoticiasPrincipal() {
        $noticias = $this->obtenerNoticias();
        echo '<div class="row">';
        if (empty($noticias)) {
            echo '<div class="col-12 text-center">No hay noticias disponibles.</div>';
        } else {
            foreach ($noticias as $noticia) {
                echo '<div class="col-12 mb-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="' . BASE_URL . '/' . htmlspecialchars($noticia['foto']) . '" class="img-fluid rounded-start" alt="Foto">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($noticia['titulo']) . '</h5>
                                        <p class="card-text">' . htmlspecialchars($noticia['descripcion']) . '</p>
                                        <p class="card-text text-end"><small class="text-muted">Publicado el ' . htmlspecialchars($noticia['fecha']) . '</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>';
            }
        }
        echo '</div>';
    }

    public function mostrarNoticiasMiniCard() {
        $noticias = $this->obtenerNoticias();
        echo '<div class="row">';
        if (empty($noticias)) {
            echo '<div class="col-12 text-center">No hay noticias disponibles.</div>';
        } else {
            foreach ($noticias as $noticia) {
                echo '<div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="' . BASE_URL . '/' . htmlspecialchars($noticia['foto']) . '" alt="Foto" />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="' . BASE_URL . '/view/noticias/noticias.php?id=' . $noticia['id'] . '"><h5 class="card-title mb-3">' . htmlspecialchars($noticia['titulo']) . '</h5></a>
                                <p class="card-text mb-0">' . htmlspecialchars(substr($noticia['descripcion'], 0, 100)) . '...</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="small">
                                            <div class="text-muted">' . htmlspecialchars($noticia['fecha']) . '</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>';
            }
        }
        echo '</div>';
    }
}
?>