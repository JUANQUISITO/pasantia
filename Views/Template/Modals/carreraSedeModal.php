
<div class="modal" id="modalCarreraSede" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nueva nombreCarrera-Sede</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>          
            </div>

                <div class="container">
                    <form method="post" id="formCarreraSede" action="<?php echo base_url(); ?>CarreraSede/insertar" >
                        <div class="modal-body">
                            <input type="hidden" name="idCarreraSede" id="idCarreraSede"  >

                            <div class="form-group">
                                <label for="nombreCarrera">Carrera</label>
                                <select style="border-color: blue;" class="form-select" aria-label="Default select example" id="nombreCarrera" name="nombreCarrera" >

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombreSede">Sede</label>
                                <select style="border-color: blue;" class="form-select" aria-label="Default select example" id="nombreSede" name="nombreSede" >

                                </select>
                            </div>
                                    
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btnAgregarCarreraSede"  type="submit"><i class="fas fa-save"></i> Registrar</button>                            
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal" ><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>                          
                    </form>
                </div>
        </div>
    </div>
</div>