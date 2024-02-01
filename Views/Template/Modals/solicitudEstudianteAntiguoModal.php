<div class="modal " id="modalEmpresa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nueva Empresa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="formEmpresa" action="<?php echo base_url(); ?>Empresas/insertar" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" name="idEmpresa" id="idEmpresa"  >
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input style="border-color: blue;" id="nombre" class="form-control" type="text" name="NombreEmpresa" placeholder="Nombre Empresa" required>
                    </div>

                    <div class="form-group">
                        <label for="areaEmpresa">Area </label>
                        <input style="border-color: blue;" id="areaEmpresa" class="form-control" type="text" name="areaEmpresa" placeholder="Area Empresa" required>
                    </div>

                    <div class="form-group">
                        <label for="nit">NIT</label>
                        <input style="border-color: blue;" id="nit" class="form-control" type="text" name="nroNit" placeholder="Nro Nit" required>
                    </div>

                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input style="border-color: blue;" id="ciudad" class="form-control" type="text" name="ciudad" placeholder="Ciudad" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input style="border-color: blue;" id="direccion" class="form-control" type="text" name="direccion" placeholder="Direccion" required>
                    </div>

                    <div class="form-group">
                        <label for="telefonoemp">Telefono Empresa</label>
                        <input style="border-color: blue;" id="telefonoemp" class="form-control" type="text" name="telfEmpresa" placeholder="Telefono Empresa" required>
                    </div>

                    <div class="form-group">
                        <label for="nombrePersona">Persona Contacto</label>
                        <input style="border-color: blue;" id="nombrePersona" class="form-control" type="text" name="personaContacto" placeholder="Persona Contacto" required>
                    </div>

                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input style="border-color: blue;" id="cargo" class="form-control" type="text" name="cargo" placeholder="Cargo de la Persona de Contacto" required>
                    </div>
                            
                    <div class="form-group">
                        <label for="telefContacto">Telefono Contacto</label>
                        <input style="border-color: blue;" id="telefContacto" class="form-control" type="text" name="telefContacto" placeholder="Telefono Persona de Contacto" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary"  id="btn_registrar" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>