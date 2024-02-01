<?php include 'Views/Template/header_lateral.php'; 
getModal('rolModal',$data);
?>
<div class="card">
    <div class="card-header card-header-primary">
        <h3>ROLES ELIMINADOS</h3>
    </div>
    <div class="card-body">
        <div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Roles"><i class="fas fa-user-slash"></i> Regresar</a>
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El Rol ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al Registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Rol Registrado Correctamente </strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Rol Actualizado Correctamente </strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive ">

                                <table class="table table-hover table-bordered" id="example">

                                    <thead class="table-primary" >
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre Rol</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php                
                                        $cont = 0;                                                                                                                                                                                                                                        
                                        foreach ($data as $cl) { $cont++;?>
                                            <tr>
                                                <td><?php echo $cont ?></td>
                                                <td><?php echo $cl['nombre']; ?></td>
                                                <td><?php echo $cl['descripcion']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Roles/reingresar?id=<?php echo $cl['id_rol']; ?>" method="post" class="d-inline confirmar">
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
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




<?php require_once 'Views/Template/foot.php'; ?>