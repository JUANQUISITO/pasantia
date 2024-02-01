<?php require_once 'Views/Template/header_lateral.php'; 

 ?>
    <div class="modal-dialog modal-lg">    
      <div class="container" style="font-size:medium;">
        <div class="modal-content " style="text-align: center;    " id="formularioRegistro">
            <div class="modal-header header-color ">
                <h5 class="modal-title " id="staticBackdropLabel ">Datos Personales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div> 
            <form style="text-align: center; " method="POST" action="<?php echo base_url(); ?>Personas/setPersons" enctype="multipart/form-data"  >
            <div class="modal-body">
                <div class="row">
                  <input type="hidden" class="form-control" id="inputIdPersona" name="inputIdPersona" value="<?= $_SESSION['idUsuario']; ?>">
      
                    <div  class="form-group col-md-6 col-xs-12 " >
                        <label style="font-size:medium;" for="nombre">Nombre</label>
                        <div class="input-group ">                      
                            <input style="border-color:blue;" type="text" id="nombre" class="form-control" name="nombre" placeholder="Introduzcca su nombre" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label style="font-size:medium;" for="apellidoPaterno">Apellido Paterno</label>
                        <div class="input-group ">                      
                            <input style="border-color:blue;"   type="text" id="apellidoPaterno" class="form-control" name="apellidoPaterno" placeholder="Introduzcca su Apellido Paterno " >
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <div class="input-group ">                      
                            <input  style="border-color:blue;"  type="text" id="apellidoMaterno" class="form-control" name="apellidoMaterno" placeholder="Introduzcca su Apellido Materno " >
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="email">e-Mail</label>
                        <div class="input-group ">                      
                            <input  style="border-color:blue;"  type="text" id="email" class="form-control" name="email" placeholder="Introduzcca su e-Mail " required>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="carnet">carnet </label>
                        <div class="input-group ">                      
                            <input style="border-color:blue;"  type="text" id="carnet" class="form-control" name="carnet" placeholder="Introduzcca su carnet  " value="<?= $data['carnet'] ?>" readonly>
                        </div>
                    </div>    
                   
                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="telefono">Telefono</label>
                        <div class="input-group ">                      
                            <input style="border-color:blue;"  type="text" id="telefono" class="form-control" name="telefono" placeholder="Introduzcca su telefono " required>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 " >
                        <label for="direccion">Direccion </label>
                        <div class="input-group ">                      
                            <input style="border-color:blue;"  type="text" id="direccion" class="form-control" name="direccion" placeholder="Introduzcca su direccion  " required>
                        </div>
                    </div>    

                </div>
            </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Agregar Datos</button>
                    <!-- <button class="btn btn-danger" type="button"  data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button> -->
                </div>
            </form>
        </div>
        </div>  
    </div>
