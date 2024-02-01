<div class="modal fade" id="modalSede" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nueva Sede</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
            </div>

            
                <div class="container">
                    <form method="post" id="formSede" action="<?php echo base_url(); ?>Sedes/insertar" autocomplete="off">
                        <div class="modal-body">
                            <input type="hidden" name="idSede" id="idSede">
                            <div class="form-group">
                                <label for="nombre_sede" id="exampleModalLabel">Sede</label>
                                <input  id="sede" class="form-control" type="text" name="sede" placeholder="Sede" required>
                                <!--
                                <select class="form-select" aria-label="Default select example" id="tipoConvenio" name="tipoConvenio">
                                                <option selected>Seleccione una opcion </option>
                                                <option value="Empresarial">Empresarial</option>
                                                <option value="Interinstitucional">Interinstitucional</option>
                                    
                                </select>
                                -->
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input  id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input  id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" required>
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

            <!--
<div class="modal fade" id="nuevo_tipo_convenio" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nuevo Sede</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
            </div>

            <div class="modal-body">
                <div class="container">
                    <form method="post" action="<?php echo base_url(); ?>TipoConvenios/insertar" autocomplete="off"> 
                        <div class="modal-body">
                            <input type="text" name="idTipoConvenio" id="idTipoConvenio" >
                            <div class="form-group">
                                <label for="nombre_tipo">Sede</label>
                                <input id="tipoConvenio" class="form-control" type="text" name="tipoConvenio" placeholder="Sede"  required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción" >
                            </div>
                        
                        </div> 
                        <div class="card-footer">
                            <button class="btn btn-primary" id="btn_registrar" type="submit"><i class="fas fa-save"></i> Registrar</button>                      
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>  
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>        
</div>
        -->