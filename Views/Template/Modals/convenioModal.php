

<div class="modal" id="modalConvenio" data-bs-backdrop="static" data-bs-keyboard="true"  aria-labelledby="nueva_soliLabel" aria-hidden="true" >
    <div class="modal-dialog modal-md ">

        <div class="modal-content">
            <div class="modal-header header-color">
                <h4 class="modal-title text-white" id="exampleModalLabel" >Nuevo Convenio</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>         
            </div>

            <form method="post" id="formConvenio" action="<?php echo base_url(); ?>Convenios/insertar"  enctype='multipart/form-data'>
                <div class="modal-body">
                    <input type="hidden" name="idConvenio" id="idConvenio"  >
                    <div class="mb-3">
                        <label for="empresa">Empresa</label>
                        <!--<input id="empresa" class="form-control" type="text" name="empresa" placeholder="Empresa">-->
                        <select style="border-color: blue;"  class="form-select" aria-label="Default select example" id="empresa" name="empresa" required>
                            <option value="">--SELECCIONAR--</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  for="tip_convenio">Tipo de Convenio</label>
                        <!---<input id="tip_convenio" class="form-control" type="text" name="tip_convenio" placeholder="Tipo de Convenio">-->
                        <select style="border-color: blue;" class="form-select" aria-label="Default select example" id="tipoConvenio" name="tipoConvenio" required>

                        </select>
                    </div>
                            
                    <div class="mb-3">
                        <label for="fechaInicio">Fecha de Inicio</label>
                        <input  style="border-color: blue;" id="fechaInicio" class="form-control" type="date" name="fechaInicio" placeholder="Fecha de Inicio" required>
                    </div>

                    <div class="mb-3">
                        <label for="fechaFinal">Fecha Final</label>
                        <input style="border-color: blue;"  id="fechaFinal" class="form-control" type="date" name="fechaFinal" placeholder="Fecha Final" required>
                    </div>
                    
                    <div class="form-group  mb-3 " >
                        <label for="nombre">Convenios</label>
                        <input style="border-color: blue;" type="file" id="archivo" class="form-control" name="archivo" accept="application/pdf" placeholder="Cargue el pdf del convenio" >
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <iframe  src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" id="imagenDefault"  style="border:none;" ></iframe>
                        <div  id="pdfconvenio" ></div>
                        <div   id="btnpdfconvenio"></div>
                    
                    </div>
                </div>               
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnAgregarConvenio"  type="submit"><i class="fas fa-save"></i> Registrar</button>                            
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal" ><i class="fas fa-window-close"></i> Cancelar</button>
                </div>  
            </form>
        </div>
    </div>
</div>

