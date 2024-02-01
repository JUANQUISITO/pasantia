<div class="modal" id="modalCarrera" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nueva Carrera</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
            </div>


                <div class="container">
                    <form method="post" id="formCarrera" action="<?php echo base_url(); ?>Carreras/insertar" autocomplete="off">
                        <div class="modal-body">
                            <input type="hidden" name="idCarrera" id="idCarrera">
                            <div class="form-group">
                                <label for="nombre_sede">Carrera</label>
                                <input style="border-color: blue;" id="carrera" class="form-control" type="text" name="carrera" placeholder="Carrera" required>
                            
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input style="border-color: blue;" id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion" required>
                            </div>  
                        </div>     
                        <div class="modal-footer bg-white" style="justify-content: center;">
                            <button class="btn btn-primary " id="btn_registrar" type="submit"><i class="fas fa-save"></i> Registrar</button>                    
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>
                           
                    </form>
                </div>

        </div>
    </div>
</div>

