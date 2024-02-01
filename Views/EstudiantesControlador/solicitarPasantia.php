<?php require_once 'Views/Template/header_lateral.php';
getModal('solicitudPasantiasModal',$data);
getModal('verificarSolicitudModal',$data);
getModal("verSeguimientoEstudianteModal",$data);

?>
<!-- Begin Page Content -->

<div class="card" >
    <div class="card-header card-header-primary">
        <h3 style="color:black;"><strong> Solicitudes de Pasantias</strong></h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                            
                                <div class="col-lg-6 mb-2">
                                <!-- <?php if($_SESSION['rol'] != "Administrador"){ ?> -->
                                    <button class="btn btn-primary" type="button" onclick="openModalSolicitud();"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>SolicitudPasantias/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                                    <!-- <?php } ?> -->
                                    <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>SolicitudPasantias/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                                </div>
                                
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>la solicitud ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Solicitud enviada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Solicitud actualizada</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Solicitud Eliminada</strong>
                                            </div>
                                        <?php } else if ($alert == "tamano") { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Solicitud no actualizada</strong>
                                        </div>
                                        <?php } else if ($alert == "adjuntar") { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Solicitud no actualizar</strong>
                                        </div>

                                    <?php }
                                    } ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col"">Carreras</label>
                                <label class="col"">Sedes</label>
                                <!-- <label class="col""></label> -->
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <select class="form-select" id="nombreCarrera" name="nombreCarrera" onChange="BuscarTablaSolicitud()">
                                </select>
                                </div> 
                                <div class="col-sm-6">
                                <select class="form-select" id="nombreSede" name="nombreSede" onChange="BuscarTablaSolicitud()">
                                </select>
                            <br>
                            </div>
                                <table class="table table-hover table-bordered SolicitudTable" id="SolicitudTable" cellspacing="0" width="100%">
                                    <thead class="table-primary">
                                        <tr>  
                                            <th>Nombre Completo</th>  
                                            <th>Carnet</th>
                                            <th>Matricula</th>
                                            <th>Carrera</th>
                                            <th>Sede</th>
                                            <th>Fecha </th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <!-- mostrando mediante json -->
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