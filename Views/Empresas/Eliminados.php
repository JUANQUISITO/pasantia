<?php include 'Views/Template/header_lateral.php'; 
?>

<div class="card">
    <div class="card-header card-header-primary">
        <h3 style="color:black;"><strong>EMPRESAS ELIMINADAS</strong></h3>
    </div>
    <div class="card-body">
        <div  >
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                            
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Empresas"><i class="fas fa-user-slash"></i> Regresar</a>
                                </div>
                                
                            </div>

                            <div class="table-responsive ">

                                <table class="table table-hover table-bordered" id="example">

                                    <thead class="table-primary" >
                                        <tr>
                                            <th># </th>
                                            <th>Nombre </th>
                                            <th>Area </th>
                                            <th>NIT</th>
                                            <th>Ciudad</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Persona de Contacto</th>
                                            <th>Cargo</th>
                                            <th>Nro de Contacto</th>                                            
                                            <th>Fecha Agregada</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                            
                                                <td><?php echo $cl['nombre_empresa']; ?></td>
                                                <td><?php echo $cl['area_empresa']; ?></td>
                                                <td><?php echo $cl['nit']; ?></td>
                                                <td><?php echo $cl['ciudad']; ?></td>
                                                <td><?php echo $cl['direccion']; ?></td>
                                                <td><?php echo $cl['telefono']; ?></td>
                                                <td><?php echo $cl['persona_contacto']; ?></td>
                                                <td><?php echo $cl['cargo']; ?></td>
                                                <td><?php echo $cl['telefono_contacto']; ?></td>  
                                                <td><?php echo $cl['fecha']; ?></td>
                                                <td><?php echo $cl['status']; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url() ?>Empresas/reingresar?id=<?php echo $cl['id_empresa']; ?>" method="post" class="d-inline confirmar">
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