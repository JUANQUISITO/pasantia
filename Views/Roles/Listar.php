<?php include 'Views/Template/header_lateral.php'; 
?>
<?php 
getModal('rolModal',$data);
if(empty($_SESSION['permisosMod']['r']))
{?>
    <p>acceso restringido</p>
<?php }else 
{

?>
<div id="contentAjax"></div>
<div class="app-title">
    <div >
        <h3 ><i class="fas fa-tachometer-alt"></i><?php echo $data['page_title'] ?></h3>
        <h5>Lista de roles</h5>
    </div>
</div>
<div class="card">
    <div class="card-header card-header-primary">
    </div>
    <div class="card-body">

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <?php if($_SESSION['permisosMod']['w'])
                                { ?>
                                <button type="button" class="btn btn-primary"onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo </button>
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>Roles/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                <?php } ?>
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
                                    <?php } else if ($alert == "completar") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Complete los Campos Vacios</strong>
                                    </div>
                                    <?php } else if ($alert == "registrado") { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Rol Registrado Correctamente </strong>
                                        </div>
                                    <?php } else if ($alert == "modificado") { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Rol Actualizado Correctamente </strong>
                                        </div>
                                    <?php } else if ($alert == "reingresar") { ?>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Rol Reingresado Correctamente </strong>
                                    </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="table-responsive ">

                            <table class="table table-hover table-bordered" id="RolTable">

                                <thead class="table-primary" >
                                    <tr>
                                        <th scope="col">Nombre Rol</th>
                                        <th scope="col">Descripcion</th>
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
        </section>
    </div>
</div>
 <?php } ?>
<?php require_once 'Views/Template/foot.php'; ?>