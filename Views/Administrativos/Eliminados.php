<?php require_once 'Views/Template/header_lateral.php'; ?>
<div class="card">
    <div class="card-header card-header-primary">
        ADMINISTRATIVOS INACTIVOS
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Administrativos"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="example">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Carrera</th>
                                            <th>Sede Institucional</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                                <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $cl['nombres']; ?></td>   
                                                <td><?php echo $cl['nombre_cargo']; ?></td>
                                                <td><?php echo $cl['carrera']; ?></td>
                                                <td><?php echo $cl['sede']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Administrativos/reingresar?id=<?php echo $cl['id_administrativo']; ?>" method="post" class="d-inline confirmar">
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