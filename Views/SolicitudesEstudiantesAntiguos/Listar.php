<?php include 'Views/Template/header_lateral.php'; 
getModal('empresaModal',$data);
?>


<div class="card">
    <div class="card-header bg-primary">
        <h3 style="color:black;"><strong>SOLICITUD DE ESTUDIANTES ANTIGUOS</strong></h3>
    </div>
    <div class="card-body">
        <div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
<!--                                     
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalEmpresa" data-bs-whatever="nuevo"><i class='bx bxs-user-plus' ></i> Agregar Nuevo Estudiante </button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>SolicitudesEstudiantesAntiguos/eliminados"><i class="fas fa-user-slash"></i> Rechazados </a>
                                 -->
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La Empresa ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La Empresa fue registrada</strong>
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
                                <table class="table table-hover table-bordered" id="SolEstAntiguosTable">
                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Nombre Completo </th>
                                            <th>Carnet </th>
                                            <th>Matricula</th>
                                            <th>Carrera</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>                                            
                                            <th>Fecha Solicitud</th>
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