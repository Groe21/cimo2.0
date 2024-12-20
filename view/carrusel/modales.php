<!-- Modal para agregar imagen -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Agregar Imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../models/carrusel/agregar_imagen.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Seleccionar Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar imagen -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../models/carrusel/actualizar_imagen.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editar-id" name="id">
                        <div class="mb-3">
                            <label for="editar-imagen" class="form-label">Seleccionar Imagen</label>
                            <input type="file" class="form-control" id="editar-imagen" name="imagen" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar imagen -->
    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarModalLabel">Eliminar Imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../models/carrusel/eliminar_imagen.php" method="POST">
                        <input type="hidden" id="eliminar-id" name="id">
                        <p>¿Estás seguro de que deseas eliminar esta imagen?</p>
                        <button type="submit" class="btn btn-danger">Eliminar Imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de éxito -->
    <div class="modal fade" id="exitoModal" tabindex="-1" aria-labelledby="exitoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exitoModalLabel">Éxito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Operación realizada con éxito.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload();">Cerrar</button>
                </div>
            </div>
        </div>
    </div>