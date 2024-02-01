<?php include 'Views/Template/header_lateral.php';  

getModal('sedeModal',$data);
?>

<div class="card">
    <div class="card-header card-header-primary">
       <h4>SEDES</h4> 
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <button type="button" class="btn btn-primary"onclick="openModalSede();" ><i class="fas fa-plus-circle"></i> Nuevo </button>    
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Sedes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                </div>
                                
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La sede ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar la sede</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La sede ha sido registrada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La sede se ha actualizado</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                            <div class="alert alert-info" role="alert">
                                                <strong>La sede se ha restaurado</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>La sede se ha eliminado</strong>
                                            </div>
                                        <?php } else if ($alert == "vacio") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>Los campos estan vacios</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="SedesTable">
                                        <thead class="table-primary" >
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Direccion</th>
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
<?php include 'Views/Template/foot.php'; ?>   


