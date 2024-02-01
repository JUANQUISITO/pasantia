<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Estudiantes/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Completo</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Matricula</th>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Teléfono</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['id']; ?></td>
                                        <td><?php echo $cl['nombres']; ?></td>
                                        <td><?php echo $cl['apellido_pat']; ?></td>
                                        <td><?php echo $cl['apellido_mat']; ?></td>
                                        <td><?php echo $cl['nromatriculla']; ?></td>
                                        <td><?php echo $cl['correo']; ?></td>
                                        <td><?php echo $cl['contrasena']; ?></td>
                                        <td><?php echo $cl['telefono']; ?></td>
                                        <td><?php echo $cl['fecha']; ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Estudiantes/reingresar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline confirmar">
                                                <button type="submit"  class="btn btn-success" ><i class="fas fa-ad"></i></button>
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