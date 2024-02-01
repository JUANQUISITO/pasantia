<div class="modal" id="modalCargo" data-bs-backdrop="static" data-bs-keyboard="true"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header header-color">
                <h4 class="modal-title" id="exampleModalLabel">Nuevo Cargo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
            </div>

            <div class="modal-body">
                <div class="container">
                    <form method="post" id="formCargo"  action="<?php echo base_url(); ?>Cargos/insertar" autocomplete="off">
                        <div class="modal-body">
                            <input type="hidden" name="idCargo" id="idCargo" >
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input style="border-color: blue;" id="cargo" class="form-control" type="text" name="cargo" placeholder="Cargo Administrativo" required>
                            </div>
                            
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btnAgregar">Agregar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

