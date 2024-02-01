
<div class="modal" id="modalFormUsuario"  data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true"  >   

  <div class="modal-dialog modal-md">
    <div class="modal-content">
    <form class="" method="POST" id="formUsuario" action="<?php echo base_url(); ?>Usuarios/setUsers" enctype="multipart/form-data" >
      <div class="modal-header header-color" >
        <h5 class="modal-title" id="nuevo_usuariolabel" aria-labelledby="nuevo_usuariolabel" >Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="container-fluid">
              <input type="hidden" class="form-control" id="inputIdUsuario" name="inputIdUsuario">
                <div class="col-md-12">
                    <label for="inputusuario" class="form-label">Usuario(Carnet)</label>
                    <input style="border-color: blue;" type="text" class="form-control" id="inputUsuario" name="inputUsuario" required>
                </div>
                <br>
                <div class="col-md-12">
                    <label for="inputPassword" class="form-label" style="color:black;" >Password <p style="color:red;" >(dejar en blanco si no quiere actualizar la contraseña)</p> </label>
                    <input style="border-color: blue;" type="password" class="form-control" id="inputPassword" name="inputPassword">
                </div>
                <div class="col-md-12">
                    <label for="input_rol" class="form-label">Rol</label>
                    <select style="border-color: blue;" id="listRolid" name="listRolid" class="form-select" required>
                    </select>
                </div>
                <!--aumentando la parte de registro de una persona-->
                <input style="border-color: blue;" type="hidden" class="form-control" id="inputIdAdministrativo" name="inputIdAdministrativo">
                <div class="col-md-12">
                    <label for="input_cargo" class="form-label">Seleccionar Cargo</label>
                    <select style="border-color: blue;" id="listCargo" name="listCargo" class="form-select" required>
                      
                    </select>
                </div>
                
                <div class="col-md-12">
                    <label for="input_carrera" class="form-label">Carrera a Administrar</label>
                    <select style="border-color: blue;" id="listCarrera" name="listCarrera" class="form-select" required>
                    </select>
                </div>
            </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="btnAgregar">Agregar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div> 
    </form>
    </div>
    </div>
</div>