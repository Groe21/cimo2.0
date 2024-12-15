<?php 
    session_start();
    include_once(__DIR__ .'../../../config/config.php');
    require_once '../../models/empleos/mostrar_empleos.php';

    $tablaEmpleos = new TablaEmpleos(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>admin Empleos</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?> /assets/img/logocimo.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
        <!-- Navegacion CSS -->
        <link href="../../css/navegacion.css" rel="stylesheet" />
         <!-- Font Awesome -->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include_once(__DIR__ .'../../../layout/barra_navegacion.php'); ?>

            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Administración de Empleos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <?php $tablaEmpleos->mostrarTablaEmpleos(); ?>
                    </div>
                </div>
            </section>
        </main>
        <!-- modales-->
        <?php include_once(__DIR__ .'/modales.php'); ?>
        <!-- Footer-->
        <?php include_once(__DIR__ .'../../../layout/pie_pagina.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
            // Script para pasar datos al modal de edición
            $('#editarModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var puesto = button.data('puesto');
                var ubicacion = button.data('ubicacion');
                var descripcion = button.data('descripcion');
                var requisitos = button.data('requisitos');
                var fecha_publicacion = button.data('fecha_publicacion');
                var modal = $(this);
                modal.find('#editarId').val(id);
                modal.find('#editarPuesto').val(puesto);
                modal.find('#editarUbicacion').val(ubicacion);
                modal.find('#editarDescripcion').val(descripcion);
                modal.find('#editarRequisitos').val(requisitos);
                modal.find('#editarFechaPublicacion').val(fecha_publicacion);
            });

            // Script para pasar datos al modal de eliminación
            $('#eliminarModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('#eliminarId').val(id);
            });
        </script>
    </body>
</html>
