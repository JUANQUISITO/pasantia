<?php require_once 'Views/Template/header_lateral.php'; ?>
<div class="card">
    <div class="card-header card-header-primary">
        <h3>CONVENIOS INACTIVOS</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Convenios"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="example">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Empresa</th>
                                            <th scope="col">Tipo de Convenio</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha Inicio</th>
                                            <th scope="col">Fecha Final</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                            <tr>
                                            <td><?php echo $c; ?></td>
                                                    <td><?php echo $cl['codigo']; ?></td>
                                                    <td><?php echo $cl['nombre_empresa']; ?></td>
                                                    <td><?php echo $cl['nombre_tipo']; ?></td>
                                                    <td><?php echo $cl['status']; ?></td>
                                                    <td><?php echo $cl['fecha_inicio']; ?></td>
                                                    <td><?php echo $cl['fecha_final']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Convenios/reingresar?id=<?php echo $cl['id_convenio']; ?>" method="post" class="d-inline confirmar">
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