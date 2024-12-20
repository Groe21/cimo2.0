 <!-- Modal para crear empleo -->
 <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear Empleo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para crear empleo -->
                    <form action="../../models/empleos/crear_empleo.php" method="POST">
                        <div class="mb-3">
                            <label for="puesto" class="form-label">Puesto</label>
                            <input type="text" class="form-control" id="puesto" name="puesto" required>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="requisitos" class="form-label">Requisitos</label>
                            <textarea class="form-control" id="requisitos" name="requisitos" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                            <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar empleo -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Empleo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para editar empleo -->
                    <form action="../../models/empleos/editar_empleo.php" method="POST">
                        <input type="hidden" id="editarId" name="id">
                        <div class="mb-3">
                            <label for="editarPuesto" class="form-label">Puesto</label>
                            <input type="text" class="form-control" id="editarPuesto" name="puesto" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarUbicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="editarUbicacion" name="ubicacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editarDescripcion" name="descripcion" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editarRequisitos" class="form-label">Requisitos</label>
                            <textarea class="form-control" id="editarRequisitos" name="requisitos" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editarFechaPublicacion" class="form-label">Fecha de Publicación</label>
                            <input type="date" class="form-control" id="editarFechaPublicacion" name="fecha_publicacion" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar empleo -->
    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarModalLabel">Eliminar Empleo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este empleo?</p>
                    <form action="../../models/empleos/eliminar_empleo.php" method="POST">
                        <input type="hidden" id="eliminarId" name="id">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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