<?php include 'Views/Template/header_lateral.php'; 
?>
<?php 
getModal('carreraSedeModal',$data);
if(empty($_SESSION['permisosMod']['r']))
{ ?>
    <p>acceso restringido</p>
<?php 
} else 
{ ?>

<div class="card mt-2">
    <div class="card-header card-header-primary">
        <h3>CARRERA - SEDE</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <?php if($_SESSION['permisosMod']['w'])
                                    { ?>
                                    <button type="button" class="btn btn-primary"onclick="openModalCarreraSede();" ><i class="fas fa-plus-circle"></i> Nuevo </button> 
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>CarreraSede/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                    <?php 
                                    } ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La carrera-sede ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La carrera-sede fue registrada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La carrera-sede fue Actualizada</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                            <div class="alert alert-info" role="alert">
                                                <strong>La carrera fue restaurada</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>La carrera-sede fue Eliminada</strong>
                                            </div>
                                        <?php } else if ($alert == "vacio") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>los campos estan vacios</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="CarreraSedesTable">
                                        <thead class="table-primary" >
                                            <tr>
                                                <th scope="col">Carrera</th>
                                                <th scope="col">Sede</th>                        
                                                <th scope="col">Estado</th>                                    
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
    
                                        </tbody>
                                    </table>         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php }?>
<?php include 'Views/Template/foot.php'; ?>