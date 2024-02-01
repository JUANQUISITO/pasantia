<div class="modal " id="modalDocente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalLabel" >Nuevo Docente</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="formDocente" action="<?php echo base_url(); ?>Docentes/insertar" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" name="idDocente" id="idDocente"  >
                    
                    <div class="form-group">
                        <label for="nombre">Nombres </label>
                        <input style="border-color: blue;" id="nombreDocente" class="form-control" type="text" name="nombreDocente" placeholder="Nombre Docente" required>
                    </div>

                    <div class="form-group">
                        <label for="apPatDoc">Apellido Paterno </label>
                        <input style="border-color: blue;" id="apPatDoc" class="form-control" type="text" name="apPatDoc" placeholder="Apellido Paterno" required>
                    </div>

                    <div class="form-group">
                        <label for="apMatDoc">Apellido Materno </label>
                        <input style="border-color: blue;" id="apMatDoc" class="form-control" type="text" name="apMatDoc" placeholder="Apellido Materno" required>
                    </div>

                    <div class="form-group">
                        <label for="carnetDocente">Carnet</label>
                        <input style="border-color: blue;" id="carnetDocente" class="form-control" type="text" name="carnetDocente" placeholder="Carnet" required>
                    </div>

                    <div class="form-group">
                        <label for="materias">Materias </label>
                        <input style="border-color: blue;" id="materias" class="form-control" type="text" name="materias" placeholder="Materias" required>
                    </div>

                    <div class="form-group">
                        <label for="fechaIngreso">Fecha de Ingreso</label>
                        <input style="border-color: blue;" id="fechaIngreso" class="form-control" type="date" name="fechaIngreso" placeholder="Fecha de Ingreso" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input style="border-color: blue;" id="telefonoDocente" class="form-control" type="tel" name="telefonoDocente" placeholder="Telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="input_rol" class="form-label">Carrera Sede</label>
                        <select style="border-color: blue;" id="listCarreraSede" name="listCarreraSede" class="form-select" required>
                        </select>
                    </div>
					
                    <div class="form-group  mb-3 " id="docenteReset">
                        <label for="nombre">Curriculum</label>
                        <input style="border-color: blue;" type="file" id="docente-pdf" class="form-control" name="archivo" accept="application/pdf" placeholder="Cargue el pdf del docente" >
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <img id="imagen_default" src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" class="img-thumbnail "  width="100px">
                        <div  id="pdfdocente" ></div>
                        <div   id="btn-pdfdocente"></div>                 
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary"  id="btnAgregarDocente" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>