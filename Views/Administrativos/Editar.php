<?php include 'Views/Template/header_lateral.php'; ?>
<!-- Begin Page Content     MODAL-->
<div class="">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Administrativos/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Administrativo</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="idPersona" value="<?php echo $data['persona_id_persona']; ?>" > 
                                <!-- se agrego en hidden para poder consultar de acuerdo al id de la persona y tiene que capturarse el id mediante un echo data -->
                                <label for="nombre">Nombres</label>
                                <input id="nombre" class="form-control" type="text" name="nombres" value="<?php echo $data['nombres']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="appaterno">Apellido Paterno</label>
                                <input id="appaterno" class="form-control" type="text" name="apellidoPat" value="<?php echo $data['apellidoPat']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="apmaterno">Apellido Materno</label>
                                <input id="apmaterno" class="form-control" type="text" name="apellidoMat" value="<?php echo $data['apellidoMat']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="carnet">Carnet</label>
                                <input id="carnet" class="form-control" type="text" name="carnet" value="<?php echo $data['carnet']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="matricula">Matricula</label>
                                <input id="matricula" class="form-control" type="text" name="nromatricula" value="<?php echo $data['nroMatricula']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" onclick="editar();"  type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Estudiantes/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'Views/Template/foot.php'; ?>