<?php include 'Views/Template/header_lateral.php'; 
getModal('tipoConveniosModal',$data);
?>
<div class="card">
    <div class="card-header card-header-primary">
        Tipo de convenios Eliminados
    </div>
    <div class="card-body">
        <div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>TipoConvenios"><i class="fas fa-user-slash"></i> Regresar</a>
                                </div>
                                <div class="col-lg-6">
                                            <?php if (isset($_GET['msg'])) {
                                                $alert = $_GET['msg'];
                                                if ($alert == "existe") { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <strong>El tipo de convenio ya existe</strong>
                                                    </div>
                                                <?php } else if ($alert == "error") { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Error al registrar</strong>
                                                    </div>
                                                <?php } else if ($alert == "registrado") { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>Tipo de convenio Registrado</strong>
                                                    </div>
                                                <?php } else if ($alert == "modificado") { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>Tipo de convenio Actualizado</strong>
                                                    </div>
                                                <?php } else if ($alert == "eliminar") { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Tipo de convenio Eliminado</strong>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                            </div>
                            <div class="table-responsive ">

                                <table class="table table-hover table-bordered" id="example">

                                    <thead class="table-primary" >
                                        <tr>
                                        <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Descripción</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                
                                                <td><?php echo $cl['nombre_tipo']; ?></td>
                                                
                                                <td><?php echo $cl['descripcion_tipo']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>TipoConvenios/reingresar?id=<?php echo $cl['id_tipo_convenio']; ?>" method="post" class="d-inline confirmar">
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
<?php require_once 'Views/Template/foot.php'; ?>