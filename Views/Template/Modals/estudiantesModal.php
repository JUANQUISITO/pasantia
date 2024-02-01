

<div class="modal" id="modalEstudiante"data-bs-backdrop="static" data-bs-keyboard="true"  aria-labelledby="nuevo_estudiante" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
        <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel"> <i class="fas fa-clipboard-list"></i>  Nuevo Estudiante</h4>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form id="frm_verficar_estudiante" method="POST">
                        <div class="text-center">
                            <label for="nro_carnet">Ingrese su Nro Carnet</label>
                            <input style="border-color: blue;" type="text" placeholder="Ingrese Nro Carnet Validos"  minlength="7"   id="nro_carnet" name="nro_carnet" class="form-control" required )">
                            <button class="btn btn-primary mt-2" type="submit">VERIFICAR</button>
                        </div>
                    </form>

                    <!--form id="frm_nuevo_estudiante" method="post" id="formEstudiante" action="<?php echo base_url(); ?>Estudiantes/insertar" autocomplete="off"-->
                    <form id="frm_nuevo_estudiante" method="POST">
                        <div class="modal-body">
                            <input type="hidden" id="idEstudiante" class="form-control" name="idEstudiante" >
                            <input type="hidden" id="idPersona" name="idPersona" class="form-control">
                            <div class="form-group">
                                <label for="nombrecompleto">Nombre Completo</label>
                                <input style="border-color: blue;" id="nombres" class="form-control" minlength="3" maxlength="255"     type="text" name="nombres" placeholder="Nombre Completo - Campo Obligatorio" required oninvalid="setCustomValidity('Por favor ingrese su nombre completo ')"  oninput="setCustomValidity('')" />
                            </div>

                            <div class="form-group">
                                <label for="appaterno">Apellido Paterno</label>
                                <input style="border-color: blue;" id="apellidoPat" class="form-control" type="text" name="apellidoPat" placeholder="Apellido Paterno">
                            </div>

                            <div class="form-group">
                                <label for="apmaterno">Apellido Materno</label>
                                <input style="border-color: blue;" id="apellidoMat" class="form-control" type="text" name="apellidoMat" placeholder="Apellido Materno">
                            </div>

                            <div class="form-group">
                                <label for="carnet">carnet</label>
                                <input style="border-color: blue;" id="carnet" class="form-control" type="text" name="carnet" placeholder="Carnet - Campo Obligatorio" minlength="7"  readonly>
                            </div>

                            <div class="form-group">
                                <label for="Matricula">Matricula</label>
                                <input style="border-color: blue;" id="nroMatricula" class="form-control" type="number" name="nroMatricula" min="5" placeholder="Matricula - Campo Obligatorio" required >
                            </div>

                            <div class="form-group">
                                <label for="telefono">Celular</label>
                                <input style="border-color: blue;" id="telefono" class="form-control" type="number"  min="8" name="telefono" placeholder="Telefono" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input style="border-color: blue;" id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección - Campo Obligatorio">
                            </div>
                            <div class="form-group">
                                <label for="input_rol" class="form-label">Carrera Sede</label>
                                <select style="border-color: blue;" id="listCarreraSede" name="listCarreraSede" class="form-select" >
                                </select>
                            </div>
                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-primary" id="btn_registrar"  type="submit"><i class="fas fa-save"></i> Registrar</button>
                                
                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  

