<?php include 'Views/Template/header_lateral.php'; 
getModal('cargoModal',$data);
?>

    <div class="card">
    <div class="card-header card-header-primary">
        <h3>CARGOS</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <button type="button" class="btn btn-primary" onclick="openModal();" ><i class="fas fa-plus-circle"></i>Nuevo</button>
                                    <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalCargo" data-bs-whatever="nuevo"><i class="bi bi-plus-circle-fill"></i>Nuevo </button>
                                     -->
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Cargos/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El Cargo ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Cargo registrado</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                            <div class="alert alert-info" role="alert">
                                                <strong>El cargo fue restaurado</strong>
                                            </div>
										<?php } else if ($alert == "vacio") { ?>
										<div class="alert alert-info" role="alert">
											<strong>llenar el campo vacio</strong>
										</div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Cargo Modificado</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="cargosTable">
                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Cargo</th>
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















