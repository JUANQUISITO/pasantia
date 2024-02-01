
<div class="modal " id="modalFormPersona" data-bs-backdrop="static" data-bs-keyboard="true"  aria-labelledby="nueva_soliLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">    
        <div class="modal-content ">
            <div class="modal-header header-color ">
                <h5 class="modal-title " id="staticBackdropLabel ">Datos Personales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Personas/setPersons" enctype="multipart/form-data"  autocomplete="off">
            <div class="modal-body">
                <div class="row">
                  <input type="text" class="form-control" id="inputIdPersona" name="inputIdPersona" value="<?= $_SESSION['idUsuario']; ?>">
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="nombre">Nombre</label>
                        <div class="input-group ">                      
                            <input style="border-color: blue;" type="text" id="nombre" class="form-control" name="nombre" placeholder="Introduzcca su nombre" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <div class="input-group ">                      
                            <input type="text" id="apellidoPaterno" class="form-control" name="apellidoPaterno" placeholder="Introduzcca su Apellido Paterno " >
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <div class="input-group ">                      
                            <input type="text" id="apellidoMaterno" class="form-control" name="apellidoMaterno" placeholder="Introduzcca su Apellido Materno " >
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="email">e-Mail</label>
                        <div class="input-group ">                      
                            <input type="text" id="email" class="form-control" name="email" placeholder="Introduzcca su e-Mail " >
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="carnet">carnet </label>
                        <div class="input-group ">                      
                            <input type="text" id="carnet" class="form-control" name="carnet" placeholder="Introduzcca su carnet  " required>
                        </div>
                    </div>    
                   
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="telefono">Telefono</label>
                        <div class="input-group ">                      
                            <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Introduzcca su telefono " >
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="direccion">Direccion </label>
                        <div class="input-group ">                      
                            <input type="text" id="direccion" class="form-control" name="direccion" placeholder="Introduzcca su direccion  " required>
                        </div>
                    </div>    

                </div>
            </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Agregar Datos</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
