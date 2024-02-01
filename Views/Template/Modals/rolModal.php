<div class="modal" id="modalFormRol" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color">
                <h4 class="modal-title" id="titulo-label">Nuevo Rol</h4>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <form method="post" id="formRol" action="<?php echo base_url(); ?>Roles/insertar" autocomplete="off">
                    <div class="modal-body">
                        <input type="hidden" name="idRoles" id="idRoles"  > 

                        <div class="form-group">
                            <label for="nombrerol">Nombre Rol</label>
                            <input style="border-color: blue;"  id="nombrerol" class="form-control" type="text" name="nombre" placeholder="Nombre Rol" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input  style="border-color: blue;" id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion" required>
                        </div>
                    
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary" id="btn-edit"  ><i class="fas fa-save"></i> Registrar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-window-close"></i>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

