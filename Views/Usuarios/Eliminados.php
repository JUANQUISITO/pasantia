<?php require_once 'Views/Template/header_lateral.php'; ?>
<div class="card">
    <div class="card-header ">
        <h3>USUARIOS ELIMINADOS</h3>
    </div>
    <div class="card-body">
        <div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Usuarios"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="example" >
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Rol</th>
                                            <th>Fecha Eliminada</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $cl) { ?>
                                            <tr>
                                                <td><?php echo $cl['nombre_usuario']; ?></td>
                                                <td><?php echo $cl['nombre']; ?></td>
                                                <td><?php echo $cl['fecha_actualizada']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Usuarios/reingresar?id=<?php echo $cl['id_persona']; ?>" method="post" class="d-inline confirmar">
                                                        <button type="submit"  class="btn btn-success" ><i class="fas fa-trash-restore"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include 'Views/Template/foot.php'; ?>  