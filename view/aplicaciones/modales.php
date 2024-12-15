<!-- Modal para aplicar a vacante -->
<div class="modal fade" id="aplicarModal" tabindex="-1" aria-labelledby="aplicarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aplicarModalLabel">Aplicar a Vacante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para aplicar a vacante -->
                    <form action="../../models/aplicaciones/crear_aplicacion.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="empleo_id" name="empleo_id">
                        <div class="mb-3">
                            <label for="nombre_candidato" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre_candidato" name="nombre_candidato" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="cv" class="form-label">Currículum Vitae (CV)</label>
                            <input type="file" class="form-control" id="cv" name="cv" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Aplicar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para eliminar aplicación -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarModalLabel">Eliminar Aplicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar esta aplicación?</p>
                    <form action="../../models/aplicaciones/eliminar_aplicacion.php" method="POST">
                        <input type="hidden" id="eliminarId" name="id">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>