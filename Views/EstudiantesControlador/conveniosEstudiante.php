<?php include 'Views/EstudiantesControlador/header_lateral_estudiante.php'; ?>


<div class="card">
    <div class="card-header card-header-primary">
        <h3>CONVENIOS</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="ConveniosTable">
                                        <thead class="table-primary" >
                                            <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Empresa</th>
                                            <th scope="col">Tipo de Convenio</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha Inicio</th>
                                            <th scope="col">Fecha Final</th>
                                            <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                       <!-- se traslado el archivo a fuciones_convenios.js                   -->
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
<?php include 'Views/EstudiantesControlador/footer.php'; ?>     