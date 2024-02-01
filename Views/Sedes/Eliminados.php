<?php include 'Views/Template/header_lateral.php'; 

?>
<div class="card">
    <div class="card-header card-header-primary">
      <h3>Sedes Eliminadas</h3>  
    </div>
    <div class="card-body">
        <div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Sedes"><i class="fas fa-user-slash"></i> Regresar</a>
                                </div>
                            
                            </div>
                            <div class="table-responsive ">

                                <table class="table table-hover table-bordered" id="example">

                                    <thead class="table-primary" >
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Direccion</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                            
                                                <td><?php echo $cl['sede']; ?></td>
                                                            
                                                <td><?php echo $cl['descripcion']; ?></td>
                                                <td><?php echo $cl['direccion']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Sedes/reingresar?id=<?php echo $cl['id_sedes']; ?>" method="post" class="d-inline confirmar">
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