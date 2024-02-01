<?php include 'Views/Template/header_lateral.php';  

getModal('materiasModal',$data);
?>

<div class="card">
    <div class="card-header card-header-primary">
       <h4><strong>MATERIAS</strong></h4> 
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <button type="button" class="btn btn-primary" onclick="openModalMaterias();" ><i class="fas fa-plus-circle"></i> Nuevo </button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Materias/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                </div>
                                
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La materia ya existe</strong>
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
                                                <strong>Materia Registrada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Materia Actualizada</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Materia Eliminada</strong>
                                            </div>
                                        <?php } else if ($alert == "reingresar") { ?>
                                            <div class="alert alert-primary" role="alert">
                                                <strong>Materia Reingresada Correctamente </strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="table-responsive">
                                   
                                    <table class="table table-hover table-bordered" id="MateriasTable">
                                        <thead class="table-primary" >
                                            <tr>
                                                <th scope="col">Materia</th>
                                                <th scope="col">Sigla</th>
                                                <th scope="col">Semestre</th>
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


