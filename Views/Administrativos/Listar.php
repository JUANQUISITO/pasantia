<?php require_once 'Views/Template/header_lateral.php'; 
//getModal('administrativoModal',$data);
?>
    <!--AQUI VA EL CONTENIDO COMO EJMPLO DASHBOARD-->
<div class="card">
    <div class="card-header card-header-primary">
       <H3> ADMINISTRATIVOS</H3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
<!--
                                <div class="col-lg-6 mb-2">
                                    
                                    <button type="button" class="btn btn-primary" onclick="openModalAdministrativo();" ><i class="bi bi-plus-circle-fill"></i>Nuevo</button>
                                
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Administrativos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                    
                                </div>
-->
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El Administrativo ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El Administrativo fue registrado</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El Administrativo fue Modificado</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="AdministrativoTable">
                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Carnet</th>
                                            <th>Cargo</th>
                                            <th>Carrera</th>
                                            <th>Sede Institucional</th>
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
<?php include 'Views/Template/foot.php'; ?>       















