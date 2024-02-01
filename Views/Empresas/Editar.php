<?php require_once 'Views/Template/header.php'; ?>
<!-- Begin Page Content -->
<div class="">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Empresas/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Empresa</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="idEmpresa" value="<?php echo $data['idEmpresa']; ?>" > 
                                <!-- se agrego en hidden para poder consultar de acuerdo al id de la persona y tiene que capturarse el id mediante un echo data -->
                               
                            </div>
                        <div class="form-group">
                            <label for="nombre">Nombre Empresa</label>
                            <input id="nombre" class="form-control" type="text" name="NombreEmpresa" value="<?php echo $data['nombre']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="areaEmpresa">Area Empresa</label>
                            <input id="areaEmpresa" class="form-control" type="text" name="areaEmpresa" value="<?php echo $data['areaEmpresa']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nit">Nit</label>
                            <input id="nit" class="form-control" type="text" name="nroNit" value="<?php echo $data['nit']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefContacto">Telefono Contacto</label>
                            <input id="telefContacto" class="form-control" type="text" name="telefContacto" value="<?php echo $data['telefonoPersContacto']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombrePersona">Persona Contacto</label>
                            <input id="nombrePersona" class="form-control" type="text" name="personaContacto" value="<?php echo $data['personaContacto']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="zona">Zona</label>
                            <input id="zona" class="form-control" type="text" name="zona" value="<?php echo $data['zona']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="calle">Calle</label>
                            <input id="calle" class="form-control" type="text" name="calle" value="<?php echo $data['calle']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input id="ciudad" class="form-control" type="text" name="ciudad" value="<?php echo $data['ciudad']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefonoemp">Telefono Empresa</label>
                            <input id="telefonoemp" class="form-control" type="text" name="telfEmpresa" value="<?php echo $data['telefono']; ?>">
                        </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Estudiantes/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>