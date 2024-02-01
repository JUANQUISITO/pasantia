  <!--MODAL SOLICITUD-->

    <!-- Modal -->

    <div class="modal " id="modalFormEstudianteSolicitud" data-bs-backdrop="static" data-bs-keyboard="true"  aria-labelledby="nueva_soliLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">    
        <div class="modal-content ">
            <div class="modal-header header-color ">
                <h5 class="modal-title text-white" id="nueva_soliLabel" ><i class="fas fa-clipboard-list"></i> Realizar la Solicitud de Pasantia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="estudianteSolicitud" method="POST" enctype="multipart/form-data" >
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="idSolicitud" class="form-control" name="idSolicitud" >
                    <input type="hidden" id="idEstudianteSolicitud" class="form-control" name="idEstudianteSolicitud" value="">
                    <input type="hidden" id="idCarreraSede" class="form-control" name="idCarreraSede" value="">
                   
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="fechainicio">Fecha Inicio Practica</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="date" id="fechaInicio" class="form-control" name="fechaInicio" placeholder="fecha Inicio" required>
                        </div>
                    </div> 

                    <div class="form-group col-md-6 col-xs-12 ">
                        <!-- <label ><strong>Direccion</strong></label> -->
                        <label for="fechaConlusion">Fecha Conclusion Practica</label>
                        <div class="input-group">
                            <!-- <div class="input-group-text"><i class="bi bi-building"></i></div> -->
                            <input style="border-color: blue;" type="date" id="fechaConclusion" name="fechaConclusion" class="form-control" placeholder="fecha Conclusion" required >
                        </div>
                    </div>
                              
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="tiempoduracion">Tiempo Duracion</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="tiempoduracion" class="form-control" name="tiempoduracion" placeholder="Tiempo Duracion">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 ">
                        <!-- <label ><strong>Direccion</strong></label> -->
                        <label for="Observaciones">Observaciones</label>
                        <div class="input-group">
                            <!-- <div class="input-group-text"><i class="bi bi-building"></i></div> -->
                            <input style="border-color: blue;" type="text" id="Observaciones" name="Observaciones" class="form-control" placeholder="Observaciones"  >
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 ">
                            <label for="cargoPracticante">Cargo Practicante</label>
                            <input style="border-color: blue;" id="cargoPracticante" class="form-control" type="text" name="cargoPracticante" placeholder="cargo Practicante" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="nombre">mensaje</label>
                        <input style="border-color: blue;" id="mensaje" class="form-control" type="text" name="mensaje" placeholder="mensaje">
                    </div>
                    <h5 class='text-center' id="titulo" ><strong>Datos de la empresa</strong></h5>
    
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="nombreEmpresa">Nombre Empresa</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="nombreEmpresa" class="form-control" name="nombreEmpresa" placeholder="Nombre Empresa" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 ">
                        <!-- <label ><strong>Direccion</strong></label> -->
                        <label for="Telefono">Telefono Empresa</label>
                        <div class="input-group">
                            <!-- <div class="input-group-text"><i class="bi bi-building"></i></div> -->
                            <input style="border-color: blue;" type="number"  min="8" name="Telefono" id="Telefono" class="form-control" placeholder="Telefono Empresa"  required >
                        </div>
                    </div>
                            
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="fax">Fax Empresa</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="number" id="Fax" class="form-control" name="Fax" placeholder="fax Duracion">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 ">
                        <!-- <label ><strong>Direccion</strong></label> -->
                        <label for="nombreDestinatario">Nombre Destinatario </label>
                        <div class="input-group">
                            <!-- <div class="input-group-text"><i class="bi bi-building"></i></div> -->
                            <input style="border-color: blue;" type="text" id="nombreDestinatario" name="nombreDestinatario" class="form-control" placeholder="Nombre Destinatario " required >
                        </div>
                    </div>
                            
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="cargoDestinatario">Cargo del Destinatario</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="cargoDestinatario" class="form-control" name="cargoDestinatario" placeholder="cargo Destinatario " required>
                        </div>
                    </div>
                           
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="direccion">Direccion </label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="direccion" class="form-control" name="direccion" placeholder="direccion  " required>
                        </div>
                    </div>
                    <h5 class='text-center' id="titulo" ><strong>Documentos Personales</strong></h5>
    
                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="nombre">Fotocopia Titulo Bachiller</label>
                        <input id="estFottitulobachiller" class="form-control" type="file" name="estFottitulobachiller" accept="application/pdf" placeholder="Fotocopia Titulo Bachiller">        
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <iframe src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" id="prevFotBachiller"  style="border:none;" ></iframe>
                        <!-- <div  id="pdfbachiller" ></div>   -->
                        <!-- <div   id="btn-pdfbachiller"></div> -->
                        <!-- Large modal -->
                       <!-- <div class="previsualizar"> -->
                            <!-- <iframe  id="estFotBachiller" frameborder="0"></iframe> -->
                            <!-- Large modal -->
                       <!-- </div> -->
                        
                    </div>
                 
                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="nombre">Fotocopia Matricula </label>
                        <input id="estfotocopiamatricula" class="form-control" type="file" name="estfotocopiamatricula" accept="application/pdf"  placeholder="Fotocopia Matricula">
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <iframe src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" id="previewMatricula"  style="border:none;" ></iframe>
                        <!-- <div  id="pdfmatricula" ></div> -->
                        <!-- <div   id="btn-pdfmatricula"></div> -->
                       
                    </div>
                </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" id="btn-sp" type="submit"><i class="fas fa-save"></i> Solicitar Pasantia</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
