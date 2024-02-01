<!-- MODAL SOLICITUD -->

    <!-- Modal -->

    <div class="modal " id="verificarModalFormSolicitud" data-bs-backdrop="static" data-bs-keyboard="true"  aria-labelledby="verificarNuevaSoli" aria-hidden="true" >
    <div class="modal-dialog modal-lg">    
        <div class="modal-content ">
            <div class="modal-header header-color">
                <h5 class="modal-title text-white" id="verificarNuevaSoli" ><i class="fas fa-clipboard-list"></i> Verificar Solicitud Pasantias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
           
            <div class="modal-body">
                <div class="row">
                    
                    <h5 class='text-center' id="titulo" ><strong>Pasantia</strong></h5>
                    
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="fechainicio">Fecha Inicio Practica</label>
                        <div class="input-group ">                      
                            <input  type="date" id="vFechaInicio" class="form-control" name="vFechaInicio" placeholder="fecha Inicio" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 "> 
                         <label for="fechaConlusion">Fecha Conclusion Practica</label>
                        <div class="input-group"> 
                            <div class="input-group-text"><i class="bi bi-building"></i></div>
                            <input style="border-color: blue;" type="date" id="vFechaConclusion" name="vFechaConclusion" class="form-control" placeholder="fecha Conclusion" readonly >
                        </div>
                    </div>
                              
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="tiempoduracion">Tiempo Duracion</label>
                        <div class="input-group ">                      
                            <input  type="text" id="vTiempoDuracion" class="form-control" name="vTiempoDuracion" placeholder="Tiempo Duracion" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 "> 
                        <label for="Observaciones">Observaciones</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-building"></i></div>
                            <input  type="text" id="vObservaciones" name="vObservaciones" class="form-control" placeholder="Observaciones" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 ">
                            <label for="cargoPracticante">Cargo Practicante</label>
                            <input id="vCargoPracticante" class="form-control" type="text" name="vCargoPracticante" placeholder="cargo Practicante" readonly>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="nombre">mensaje</label>
                        <input  id="vMensaje" class="form-control" type="text" name="vMensaje" placeholder="mensaje" readonly>
                    </div>
                    <h5 class='text-center' id="titulo" ><strong>Datos de la empresa</strong></h5>
    
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="nombreEmpresa">Nombre Empresa</label>
                            <input class="form-control"  type="text" id="vNombreEmpresa" nombre="vNombreEmpresa" placeholder="Nombre Empresa" readonly>
                    </div> 

                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="Telefono">Telefono Empresa</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-building"></i></div>
                            <input style="border-color: blue;" type="int" name="vTelefono" id="vTelefono" class="form-control" placeholder="Telefono Empresa" readonly > 
                        </div>
                    </div>
                            
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="fax">Fax Empresa</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="int" id="vFax" class="form-control" name="vFax" placeholder="fax Duracion" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 "> 
                        <label for="nombreDestinatario">Nombre Destinatario </label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-building"></i></div>
                            <input style="border-color: blue;" type="text" id="vNombreDestinatario" name="vNombreDestinatario" class="form-control" placeholder="Nombre Destinatario " readonly >
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="cargoDestinatario">Cargo del Destinatario</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="vCargoDestinatario" class="form-control" name="vCargoDestinatario" placeholder="cargo Destinatario " readonly>
                        </div>
                    </div> 
                           
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="direccion">Direccion </label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="vDireccion" class="form-control" name="vDireccion" placeholder="direccion  " readonly>
                        </div>
                    </div>
                    <h5 class='text-center' id="titulo" ><strong>Documentos Personales</strong></h5>
    
                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="nombre">Fotocopia Titulo Bachiller</label>
                        <div  id="vPdfbachiller" ></div>  
                        <div   id="vBtn-pdfbachiller"></div> 
                    </div>
                 
                    <div class="form-group col-md-6 col-xs-12 ">
                        <label for="nombre">Fotocopia Matricula </label>
                        <div  id="vPdfmatricula" ></div>
                        <div   id="vBtn-pdfmatricula"></div>
                    </div> 
                 </div>
            <form method="POST" id="formVerificaSolicitud" enctype="multipart/form-data" >
                 <div class="row">
                 <input type="hidden" id="idSolicitudVerificar" class="form-control" name="idSolicitudVerificar" >
                 <input type="hidden" id="idCarreraSedeVS" class="form-control" name="idCarreraSedeVS" >
                 <div class="form-group col-md-6 col-xs-12">
                        <label for="selecionar opcion">Seleccionar</label>
                        <select id="selecionar_revision" name="selecionar_revision" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="0" selected>seleccione una opcion</option>
                            <option value="revisado">REVISADO</option>
                            <option value="observado">OBSERVADO</option>
                            <option value="rechazado">RECHAZADO</option>
                            <option value="finalizado">FINALIZADO</option>   <!--SOLO MOSTRAR A JEFATURA DE CARRERA Y DIRECCION ACADEMICA -->
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-xs-12">
                        <label for="mensaje_seguimiento">Observaciones</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="vMensaje_seguimiento" class="form-control" name="vMensaje_seguimiento" placeholder="escriba algun comentario ">
                        </div>
                    </div> 
                </div>

                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" id="btn-verificar" type="submit"><i class="fas fa-save"></i> Solicitar Pasantia</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


