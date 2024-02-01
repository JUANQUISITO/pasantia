<?php include 'Views/Template/header_lateral.php'; 
?>
<?php 
getModal('convenioModal',$data);
getModal('verConvenioModal',$data);
if(empty($_SESSION['permisosMod']['r']))
{?>
    <p>acceso restringido</p>
<?php }
else 
{
?>

<div class="card">
    <div class="card-header card-header-primary">
        <h3>CONVENIOS</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">

                                   
                                    <?php  if($_SESSION['permisosMod']['w']){ ?>
                                    <button type="button" class="btn btn-primary"onclick="openModalConvenio();" ><i class="bi bi-plus-square-fill"></i> Nuevo </button>    
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Convenios/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                    <?php }?>
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El convenio ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Convenio Registrado</strong>
                                            </div>
                                        <?php } else if ($alert == "actualizado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Convenio Actualizado</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Convenio Eliminado</strong>
                                            </div>
                                        <?php } else if ($alert == "vacio") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>los campos estan vacios</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="ConveniosTable">
                                        <thead class="table-primary" >
                                            <tr>
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
                                       <!-- se traslado el archivo a fuciones_convenios.js                   -->
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
<?php } ?>
<?php include 'Views/Template/foot.php'; ?>