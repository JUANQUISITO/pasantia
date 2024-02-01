<?php include 'Views/Template/header_lateral.php'; 
getModal('docentesModal',$data);
?>

<div class="card">
    <div class="card-header card-header-primary">
        <h3 id="titulosListar"><strong>DOCENTES</strong></h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light"> 
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                
                                    <button class="btn btn-primary" type="button" onclick="openModalDocente();" ><i class="fas fa-plus-circle"></i> Nuevo </button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Docentes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El Docente ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El Docente fue agregada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El Docente fue modificada</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive ">
                                <table class="table table-hover table-bordered" id="DocenteTable">
                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Nombre Completo </th>
                                            <th>Carrera</th>
                                            <th>Sede</th> 
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

<?php require_once 'Views/Template/foot.php'; ?>