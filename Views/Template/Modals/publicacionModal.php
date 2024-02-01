<div class="modal " id="modalPublicacion" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel">Nueva Publicacion</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>            
            </div>

            <div class="container">
                <form method="post" id="formPublicacion" action="<?php echo base_url(); ?>Publicaciones/insertar" autocomplete="off">
                    <div class="modal-body">

                        <input type="hidden" name="idPublicacion" id="idPublicacion" >
                        <div class="row">
                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Titulo de la Pasantia</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-laptop-fill"></i></div>
                                    <input style="border-color: blue;" type="text" id="titulo" name="titulo" class="form-control" placeholder="Ejemplo: Empresa ENFE requiere pasantes de Informatica" required>
                                </div>
                            </div>

                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Institucion</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-bank"></i></div>
                                
                                    <select style="border-color: blue;" class="form-select" aria-label="Default select example" id="institucion" name="institucion" >

                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="form-group col-md-6 ms-auto">
                            <label ><strong>Direccion</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-building"></i></div>
                                <input type="text" name="direccion" class="form-control" placeholder="Ingrese la direccion de la empresa" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                            </div>
                        </div>
                        -->
                        <div class="row">
                            <div class="form-group col-md-6 ms-auto">
                                <label><strong>Cantidad de Pasantes</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-list-ol"></i></div>
                                    <input style="border-color: blue;" type="number" name="cantPasantes" id="cantPasantes" class="form-control" placeholder="cantidad de pasantes"  required>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Remuneración</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-currency-dollar"></i></div>
                                    <input style="border-color: blue;" type="number" name="remuneracion" id="remuneracion" class="form-control" placeholder="Remuneración por la pasantia " required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Beneficios</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-file-medical-fill"></i></div>
                                    <input style="border-color: blue;" type="text" name="beneficios" id="beneficios" class="form-control" placeholder="Beneficios de la pasantía" >
                                </div>
                            </div>

                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Tiempo de la pasantia(Duración)</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar2-day"></i></div>
                                    <input style="border-color: blue;" type="text" name="tiempoPasantia" id="tiempoPasantia" class="form-control" placeholder="Ejemplo: 3 meses" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 ms-auto">
                                <label><strong>Descripcion del puesto</strong> </label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-card-list"></i></div>
                                    
                                    <input style="border-color: blue;" type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Describa el puesto de la pasantia" required>
                                </div>
                            </div>

                            <div class="form-group col-md-6 ms-auto" >
                                <label><strong>Carrera a la que va dirigida </strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-archive-fill"></i></div> 
                                    <select style="border-color: blue;" name="area" id="area" class="form-control" >
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 ms-auto" >
                                <label><strong>Fecha límite de postulación</strong> </label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar2-month-fill"></i></div>
                                    <input style="border-color: blue;" type="date" name="fechaLimite" id="fechaLimite" class="form-control" placeholder="Fecha limite hasta la que se puede postular" required>
                                </div>
                            </div> 

                            <div class="form-group col-md-6 ms-auto" >
                                <label><strong>Fecha de publicacion</strong> </label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar2-month-fill"></i></div>
                                    <input style="border-color: blue;" type="date" name="fechaPublicacion" id="fechaPublicacion" class="form-control" placeholder="Fecha en la que se realiza la publicacion" >
                                </div>
                            </div> 
                        </div>  
                        <div class="row">
                            <!--informacion de contacto-->
                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Persona de contacto</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                                    <input style="border-color: blue;" type="text" name="contacto" id="contacto" class="form-control" placeholder="Ingrese el nombre de contacto" required>
                                </div>
                            </div>

                            <div class="form-group col-md-6 ms-auto">
                                <label ><strong>Número de contacto (Informaciones)</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-telephone-forward-fill"></i></div>
                                    <input style="border-color:blue;" type="tel" name="telContacto" id="telContacto" class="form-control" placeholder="Ingrese el numero  de contacto" required>
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="regisPubli"  type="submit"></i> Registrar</button>                                          
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal"> Cancelar</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>