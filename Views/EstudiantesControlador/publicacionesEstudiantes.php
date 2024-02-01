<?php include 'Views/EstudiantesControlador/header_lateral_estudiante.php'; 
getModal('publicacionVerModal',$data);
?>

<div class="card">
    <div class="card-header card-header-primary">
        <h3>PUBLICACIONES</h3>
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">                         
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="example">
                                        <thead class="table-primary" >
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Empresa</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">Fecha limite de postulacion</th>
                                            <th scope="col">Fecha de publicacion</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                            <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $cl['titulo']; ?></td>
                                                    <td><?php echo $cl['nombre_empresa']; ?></td>
                                                    <td><?php echo $cl['carrera']; ?></td>
                                                    <td><?php echo $cl['fecha_limite_postulacion']; ?></td>
                                                    <td><?php echo $cl['fecha_publicacion']; ?></td>
                                                    <td><?php echo $cl['status']; ?></td>
                                                    <td> 
                                                       
                                                        <button class="btn btn-warning" onclick="verPublicacion(<?php echo $cl['id_convocatoria']; ?>)"   ><i class="bi bi-eye-fill"></i></button>

                                                    </td>                                                   
                                                </tr>
                                            <?php } ?>                      
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