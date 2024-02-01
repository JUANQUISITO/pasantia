<?php require_once 'Views/Template/header_lateral.php'; ?>
<div  >
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#nuevo_estudiante" data-bs-whatever="nuevo">Nuevo </button>
                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->
                          
                            <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>Convenios/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                        </div>
                        
                    </div>
                    
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark" >
                                <tr>
                                    
                                    <th>Nombre Completo</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Carnet</th>
                                    <th>Matricula</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                
                                foreach ($data as $cl) { ?>
                                    <tr>
                                               
                                        <td><?php echo $cl['nombres']; ?></td>
                                        <td><?php echo $cl['apellidoPat']; ?></td>
                                        <td><?php echo $cl['apellidoMat']; ?></td>
                                        <td><?php echo $cl['carnet']; ?></td>
                                        <td><?php echo $cl['nroMatricula']; ?></td>
                                        <td><?php echo $cl['telefono']; ?></td>
                                        <td><?php echo $cl['direccion']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Estudiantes/editar?idPersona=<?php echo $cl['idPersona']; ?>" class="btn btn-primary" onclick="modificar();"><i class="fas fa-edit"></i>Editar</a>
                                            <form action="<?php echo base_url() ?>Estudiantes/eliminar?idPersona=<?php echo $cl['idPersona']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" onclick="eliminar();"  class="btn btn-danger"><i class="fas fa-trash-alt">Eliminar</i></button>
                                            </form>
                                        </td>

                                        
                                     
                                    </tr>

               
                                <?php } ?>
                            </tbody>
                            <form action="<?php echo base_url() ?>Estudiantes/eliminar?idPersona=<?php echo $cl['idPersona']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" onclick="eliminar();"  class="btn btn-danger"><i class="fas fa-trash-alt">Contar</i></button>
                                            </form>

                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#nuevo_estudiante" data-bs-whatever="nuevo">Nuevo </button>               
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'Views/Template/foot.php'; ?>

