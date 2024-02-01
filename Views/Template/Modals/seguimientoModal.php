<!-- <?php include 'Views/Template/header_lateral.php'; ?>    -->


<div class="card">
    <div class="card-header card-header-primary">
       <h4>SEGUIMIENTO DE LA PASANTIA </h4>
    </div>
    <div class="card-body" id="formSeguimiento">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nuevo_convenio" data-bs-whatever="nuevo">Nuevo </button>
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
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Convenio Actualizado</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Convenio Eliminado</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="Tableseguimiento">
                                        <thead class="table-primary" >
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">estado de seguimiento</th>    
                                            <th scope="col">Solicitud de pasantia</th>
                                            <th scope="col">Mensaje de evaluacion</th>                                         
                                            <th scope="col">Donde</th>
                                            <th scope="col">Fecha de solicitud</th>
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

<!-- <?php include 'Views/Template/foot.php'; ?>    -->


