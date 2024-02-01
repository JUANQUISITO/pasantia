<?php include 'Views/EstudiantesControlador/header_lateral_estudiante.php'; 
getModal("estudiantesModal",$data);
getModal("estudianteSolicitudPasantiaModal",$data);
?>
    <!--AQUI VA EL CONTENIDO COMO EJMPLO DASHBOARD-->
<div class="card">
    <div class="card-header card-header-primary">
        ESTUDIANTES
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">

                                    <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo </button>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>Estudiantes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                                                                  
                                </div>
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
<?php include 'Views/EstudiantesControlador/footer.php'; ?>       















