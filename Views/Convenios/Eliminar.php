<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Convenios/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered" id="convenios">
                            <thead class="table-primary" >
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">e</th>
                                <th scope="col">Tipo de Convenio</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Final</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>   
                                <?php foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['idConvenio']; ?></td>
                                        <td><?php echo $cl['codigo']; ?></td>
                                        <td><?php echo $cl['empresa']; ?></td>
                                        <td><?php echo $cl['tipoConvenio']; ?></td>
                                        <td><?php echo $cl['estado']; ?></td>
                                        <td><?php echo $cl['fechaInicio']; ?></td>
                                        <td><?php echo $cl['fechaFinal']; ?></td>
                                                    
                                        <td> 
                                            <a href="<?php echo base_url() ?>Convenios/editar?idConvenio=<?php echo $cl['idConvenio']; ?>" class="btn btn-primary" onclick="modificar();"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Convenios/eliminar?idConvenio=<?php echo $cl['idConvenio']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" onclick="eliminar();"  class="btn btn-danger"><i class="bi bi-trash"></i></button>
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