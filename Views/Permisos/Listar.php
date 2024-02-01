<?php include 'Views/Template/header_lateral.php'; ?>
<div  >
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#nuevo_Rol" data-bs-whatever="nuevo"> Nuevo </button>
                            <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>Convenios/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El Rol ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Rol agregado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Rol Modificado</strong>
                                    </div>
                                <?php } else if ($alert == "eliminado") { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Rol Eliminado</strong>
                                </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead" >
                                <tr>
                                    <th>Nombre Rol</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php                                                                                                                                                                                                                                                        
                                foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['nombreRol']; ?></td>
                                        <td><?php echo $cl['Descripcion']; ?></td>
                                        <td><?php echo $cl['status']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>Roles/editar?idRoles=<?php echo $cl['idRoles']; ?>" class="btn btn-primary" ><i class="fas fa-edit"></i>Editar</a>
                                            <form action="<?php echo base_url() ?>Roles/eliminar?idRoles=<?php echo $cl['idRoles']; ?>" method="post" class="d-inline elim">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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

            
<div class="modal fade" id="nuevo_Rol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Nuevo Rol</h4>
                <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" action="<?php echo base_url(); ?>Roles/insertar" autocomplete="off">
                        <div class="modal-body">
                            <input type="hidden" name="idRoles" value="<?php echo $data['idRoles']; ?>" > 
                            <div class="form-group">
                                <label for="nombrerol">Nombre Rol</label>
                                <input id="nombrerol" class="form-control" type="text" name="nombrerol" placeholder="Nombre Rol" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                            </div>
                        
                        </div>
                        <div class="card-footer">

                            <button class="btn btn-primary"  type="submit"><i class="fas fa-save"></i> Registrar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'Views/Template/foot.php'; ?>