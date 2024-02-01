<?php include 'Views/Template/header_lateral.php'; 
getModal('empresaModal',$data);
if(empty($_SESSION['permisosMod']['r']))
{
    ?> <p>accesos restringido</p> 
<?php 
}
else 
{
?>


<div class="card">
    <div class="card-header card-header-primary">
        <h3>EMPRESAS</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light"> 
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                <?php if($_SESSION['permisosMod']['w']) { ?>	
                                    <button class="btn btn-primary" type="button" onclick="openModalEmpresa();" ><i class="fas fa-plus-circle"></i> Nuevo </button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Empresas/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                <?php } ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La Empresa ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "completar") { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Completar los campos vacios</strong>
                                        </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La Empresa fue agregada</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                            <div class="alert alert-info" role="alert">
                                                <strong>La Empresa fue restaurada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La Empresa fue modificada</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive ">
                                <table class="table table-hover table-bordered" id="EmpresaTable">
                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Nombre </th>
                                            <th>Area </th>
                                            <th>NIT</th>
                                            <th>Ciudad</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Persona de Contacto</th>
                                            <th>Cargo</th>
                                            <th>Nro de Contacto</th>                                            
                                            <th>Fecha Agregada</th>
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
<?php } ?>
<?php require_once 'Views/Template/foot.php'; ?>