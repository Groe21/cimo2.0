<?php
// Incluir el archivo de configuración global
require_once __DIR__ . '/../../config/config.php';

// Incluir el archivo de conexión usando __DIR__
require_once __DIR__ . '/../../config/conexion.php';

class TablaCarrusel {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerImagenes() {
        $sql = "SELECT * FROM carrusel";
        return $this->conexion->obtenerDatos($sql);
    }

    public function mostrarTablaCarrusel() {
        $imagenes = $this->obtenerImagenes();
        echo '<div class="container mt-5">
                <h2 class="fw-bolder text-center">Administrar Carrusel</h2>
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Lista de Imágenes del Carrusel</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                            Agregar Imagen
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>';
        if (empty($imagenes)) {
            echo '<tr><td colspan="2" class="text-center">No hay imágenes registradas.</td></tr>';
        } else {
            foreach ($imagenes as $imagen) {
                echo '<tr>
                        <td><img src="' . BASE_URL . '/uploads' . htmlspecialchars($imagen['imagen']) . '" alt="Imagen" width="100"></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal"
                                    data-id="' . $imagen['id'] . '"
                                    data-imagen="' . htmlspecialchars($imagen['imagen']) . '">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal"
                                    data-id="' . $imagen['id'] . '">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                      </tr>';
            }
        }
        echo '          </tbody>
                        </table>
                    </div>
                </div>
              </div>';
    }

    public function carruselPrincipal() {
        $imagenes = $this->obtenerImagenes();
        echo '<div id="carrouselPrincipal" class="carousel slide my-5">
                <div class="carousel-inner">';
        if (empty($imagenes)) {
            echo '<div class="carousel-item active">
                    <img src="' . BASE_URL . '/assets/img/imagen1.jpg" class="d-block w-100 img-fluid" alt="...">
                  </div>';
        } else {
            $active = 'active';
            foreach ($imagenes as $imagen) {
                echo '<div class="carousel-item ' . $active . '">
                        <img src="' . BASE_URL . '/uploads' . htmlspecialchars($imagen['imagen']) . '" class="d-block w-100 img-fluid" alt="...">
                      </div>';
                $active = '';
            }
        }
        echo '  </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carrouselPrincipal" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carrouselPrincipal" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
              </div>';
    }
}
?>