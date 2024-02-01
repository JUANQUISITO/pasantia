<?php include 'Views/Template/header_lateral.php'; 
?>

<div class="card">
    <div class="card-header card-header-primary">
        <h3 style="color:black;"><strong>DOCENTES ELIMINADOS</strong></h3>
    </div>
    <div class="card-body">
        <div  >
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                            
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Docentes"><i class="fas fa-user-slash"></i> Regresar</a>
                                </div>
                                
                            </div>

                            <div class="table-responsive ">

                                <table class="table table-hover table-bordered" id="example">

                                    <thead class="table-primary" >
                                        <tr>
                                            <th>Nombre Completo </th>
                                            <th>Carnet </th>
                                            <th>Materias </th>
                                            <th>Semestres </th>
                                            <th>Año de Ingreso</th>
                                            <th>Celular</th>
                                            <th>Carrera</th>
                                            <th>Sede</th> 
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $cl['apellido_paterno_docente']; ?></td>
                                                <td><?php echo $cl['carnet_docente']; ?></td>
                                                <td><?php echo $cl['materias']; ?></td>
                                                <td><?php echo $cl['semestre']; ?></td>
                                                <td><?php echo $cl['fecha_ingreso']; ?></td>
                                                <td><?php echo $cl['nro_celular']; ?></td>
                                                <td><?php echo $cl['carrera']; ?></td>
                                                <td><?php echo $cl['sede']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>

                                                <td>
                                                    <form action="<?php echo base_url() ?>Convenios/reingresar?id=<?php echo $cl['id_convenio']; ?>" method="post" class="d-inline confirmar">
                                                        <button type="submit"  class="btn btn-success" ><i class="fas fa-trash-restore"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
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