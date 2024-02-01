<div class="modal" id="modalMateria" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="formMateria" action="<?php echo base_url(); ?>Materias/insertar" autocomplete="off">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="exampleModalLabel" >Nueva Materia</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                
                </div>
                <div class="modal-body">
                    <div class="container-fluid">  
                        <input type="hidden" name="idMateria" id="idMateria">
                        <div class="form-group">
                            <label for="nombre_materia">Materia</label>
                            <input style="border-color: blue;" id="materia" class="form-control" type="text" name="materia" placeholder="Ingrese el nombre de la materia" required>
                        </div>
                        <div class="form-group">
                            <label for="sigla_materia">Sigla</label>
                            <input style="border-color: blue;" id="siglaMateria" class="form-control" type="text" name="siglaMateria" placeholder="Ingrese el nombre de la materia">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Semestre</label>
                            <select style="border-color: blue;" class="form-select" aria-label="Default select example" name="semestre" id="semestre">
                                <option value="0">--SELECCIONE EL SEMESTRE--</option>
                                <option value="1ER SEMESTRE">1ER SEMESTRE</option>
                                <option value="2DO SEMESTRE">2DO SEMESTRE</option>
                                <option value="3ER SEMESTRE">3ER SEMESTRE</option>
                                <option value="4TO SEMESTRE">4TO SEMESTRE</option>
                                <option value="5TO SEMESTRE">5TO SEMESTRE</option>
                                <option value="6TO SEMESTRE">6TO SEMESTRE</option>
                            </select>
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
