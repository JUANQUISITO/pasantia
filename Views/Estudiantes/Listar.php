<?php include 'Views/Template/header_lateral.php'; 
getModal("estudiantesModal",$data);
?>
<?php 
getModal("estudianteSolicitudPasantiaModal",$data);
if(empty($_SESSION['permisosMod']['r']))
{?>
    <p>acceso restringido</p>
<?php }
else 
{
?>
    <!--AQUI VA EL CONTENIDO COMO EJMPLO DASHBOARD-->
<div class="card">
    <div class="card-header card-header-primary">
        <h3><strong> ESTUDIANTES </strong></h3>
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
                                    <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo </button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Estudiantes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                   <?php } ?>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El Estudiante ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar el estudiante</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Estudiante registrado</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Estudiante Modificado</strong>
                                            </div>
                                        <?php } else if ($alert == "vacio") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>los campos estan vacios</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4">Sedes</label>
                                <label class="col-sm-4">Carreras</label>
                                <!-- <label class="col""></label> -->
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <select class="form-select" id="nombreSede" name="nombreSede" onChange="BuscarTablaEstudiante()">

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-select" id="nombreCarrera" name="nombreCarrera" onChange="BuscarTablaEstudiante()">
                        
                                    </select>
                                </div> 
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="tableEstudiantes">
                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Nombre Completo</th>
                                            <th>Carrera</th>
                                            <th>Sede</th>
                                            <th>Carnet</th>
                                            <th>Matricula</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Fecha Agregada</th>   
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

<?php }?>
<?php include 'Views/Template/foot.php'; ?>       















