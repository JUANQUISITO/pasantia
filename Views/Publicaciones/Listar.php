<?php include 'Views/Template/header_lateral.php'; 
getModal('publicacionModal',$data);
getModal('publicacionVerModal',$data);
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
        <h3>Publicaciones</h3>
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
                                    <button type="button" class="btn btn-primary"onclick="openModalPublicacion();" ><i class="bi bi-file-plus-fill"></i> Nuevo </button>                                                  
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Publicaciones/eliminados"><i class="bi bi-trash3-fill"></i> Eliminados</a>
									<?php }?>
								</div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La publicacion ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "completar") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>Completar los campos vacios</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar la publicacion</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Publicacion Registrada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La publicacion fue actualizada</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                            <div class="alert alert-info" role="alert">
                                                <strong>La publicacion fue restaurada</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>La publicacion fue eliminada</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="PublicacionTable">
                                        <thead class="table-primary" >
                                            <tr>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Empresa</th>
                                            <th scope="col">Direccion</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">Fecha limite de postulacion</th>
                                            <th scope="col">Fecha de publicacion</th>
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
<?php } ?>
<?php include 'Views/Template/foot.php'; ?>