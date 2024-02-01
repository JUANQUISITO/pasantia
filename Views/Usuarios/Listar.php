<?php require_once 'Views/Template/header_lateral.php'; 
?>
<?php 
getModal('usuariosModal',$data);
if(empty($_SESSION['permisosMod']['r']))
{?> 
    <p>acceso restringido </p>
<?php 
}else 
{ ?>

<div class="card" style="border-style: solid;">
    <br>
    <div class="card-header card-header-primary">
        <h3 style="color:blue;" ><strong>USUARIOS</strong></h3>
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
                                {?>
                                    <button type="button" class="btn btn-primary" onclick="openModal();" ><i class="fas fa-plus-circle"></i>Nuevo</button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Usuarios/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                               
                                <?php } ?> 
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El Usuario ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Usuario registrado</strong>
                                            </div>
                                        <?php } else if ($alert == "actualizado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Usuario Modificado</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                        <div class="alert alert-primary" role="alert">
                                            <strong>Usuario Restaurado</strong>
                                        </div>
                                        <?php } else if ($alert == "agregado") { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Usuario Agregado</strong>
                                        </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="UserTable">
                                    <thead class="table-primary" >
                                        <tr>
                                            
                                            <th>Usuario</th>
                                            <th>Nombre Completo</th>
                                            <th>Rol</th>
                                            <th>Fecha de Registro</th>
                                            <th>Cargo</th>
                                            <th>Carrera Administrada</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    
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
<?php }?>
<?php include 'Views/Template/foot.php'; ?>