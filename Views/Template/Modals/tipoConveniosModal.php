<div class="modal" id="modalTipoConvenio" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="formTipoConvenio" action="<?php echo base_url(); ?>TipoConvenios/insertar" >
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="exampleModalLabel" >Nuevo Tipo de Convenio</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                
                </div>
                <div class="modal-body">
                    <div class="container-fluid">  
                        <input type="hidden" name="idTipoConvenio" id="idTipoConvenio">
                        <div class="form-group">
                            <label for="nombre_tipo">Tipo de Convenio</label>
                            <input style="border-color: blue;" id="tipoConvenio" class="form-control" type="text" name="tipoConvenio" placeholder="Tipo de Convenio" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input style="border-color: blue;" id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary " id="btn_registrar" type="submit"><i class="fas fa-save"></i> Registrar</button>                                           
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>
                    </div>    
                </div>
            </form>
        </div>
    </div>
</div>

            <!--
<div class="modal fade" id="nuevo_tipo_convenio" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nuevo Tipo de Convenio</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
            </div>

            <div class="modal-body">
                <div class="container">
                    <form method="post" action="<?php echo base_url(); ?>TipoConvenios/insertar" autocomplete="off"> 
                        <div class="modal-body">
                            <input type="text" name="idTipoConvenio" id="idTipoConvenio" >
                            <div class="form-group">
                                <label for="nombre_tipo">Tipo de Convenio</label>
                                <input id="tipoConvenio" class="form-control" type="text" name="tipoConvenio" placeholder="Tipo de Convenio"  required>
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