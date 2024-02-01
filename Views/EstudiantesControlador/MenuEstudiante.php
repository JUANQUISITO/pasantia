<?php include 'Views/EstudiantesControlador/header_lateral_estudiante.php';
    getModal('solicitudPasantiasModal',$data);
    getModal('verificarSolicitudModal',$data);
    getModal("verSeguimientoEstudianteModal",$data);

?>

<div id="layoutSidenav">
            
            <div id="layoutSidenav_content" class="right">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>EstudiantesControlador/estudiantesListar">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>Home/mostrarCharts">Graficos</a></li>
                        </ol>



                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">CONVENIOS</div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Convenios/Listar">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> ARCHIVOS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Empresas/Listar">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">PUBLICACIONES</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Publicaciones/Listar">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <br><br>
                        <div class="container">
                            <div class="row justify-content-sm-center">
                                <div class="col-sm-4">
                                
                                <div class="card text-white bg-secondary">
                                    <a href="<?php echo base_url() ?>seguimiento" type="button"  class="btn btn-outline-warning text-white">
                                        <div class="card-body">
                                        <figure class="text-center">
                                        <p> <h2><strong><br><br>SEGUIMIENTO<br><br><br></strong></h2></p>
                                        </figure> 
                                        </div>
                                    </a>
                                </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="card text-white bg-secondary"  >
                                    <a href="#" type="button" onClick="fntSolicitud('.$arrData[$i]['id_estudiante'].')" class="btn btn-outline-warning text-white">
                                    
                                        <div  style="font-size: 58px;" class="card-body">
                                            
                                            <figure class="text-center">
                                            
                                                <p><h2 ><strong><br><br>SOLICITAR CARTA DE PASANTIA<br><br></strong></h2></p>
                                            
                                            </figure>
                                            <!--<i style="font-size: 78px;" class='bx bxs-envelope bx-tada' ></i>-->
                                        </div>
                                    </a>
                                </div>

                                </div>
                            </div>
                        </div> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DATOS DE LAS CARRERAS
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Carrera</th>
                                            <th>Nº Estudiantes</th>
                                            <th>Año</th>
                                            <th>Fecha </th>
                                            <th>Empresa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Carrera</th>
                                            <th>Nº Estudiantes</th>
                                            <th>Age</th>
                                            <th>Fecha </th>
                                            <th>Empresa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Informatica</td>
                                            <td>100</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td>ANH</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Mecanica</td>
                                            <td>250</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td>DeLaPaz</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Electronica</td>
                                            <td>50</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td>INNOVA</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Electrica</td>
                                            <td>159</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td>EASBA</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Quimica</td>
                                            <td>80</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td>Bolivia Tv</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Metalurgia</td>
                                            <td>90</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Industria Textil</td>
                                            <td>300</td>
                                            <td></td>
                                            <td>11/02/2022</td>
                                            <td>SENARECOM</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    
    <br><br>
    <script>
        function fntSolicitud(idEstudiante){
            if(!!idEstudiante){
                //console.log(idEstudiante+" function")
                $('#modalFormEstudianteSolicitud').modal('show');
                $("#idEstudianteSolicitud").val(idEstudiante);
            }
            //mostrar mensaje o que se recargue la pagina

        }
    </script>
<?php include 'Views/EstudiantesControlador/footer.php'; ?>     