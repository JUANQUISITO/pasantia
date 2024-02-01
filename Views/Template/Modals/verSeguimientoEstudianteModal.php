
<div class="modal" id="modalFormVerSeguimiento"  data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true"  >   

<div class="modal-dialog modal-lg">
  <div class="modal-content">
  <form class="" method="POST" id="formSeguimiento" action="<?php echo base_url(); ?>Seguimiento/Listar" enctype="multipart/form-data" >
    <div class="modal-header header-color" >
      <h5 class="modal-title" id="nuevo_usuariolabel" aria-labelledby="nuevo_usuariolabel" >SEGUIMIENTO DE LA PASANTIA </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="container-fluid" style="margin-left:10px; ">
        <input type="hidden" id="idSolicitudVerSeguimiento" class="form-control" name="idSolicitudVerSeguimiento" >
        <div class="card" >
          
          <figure class="text-center">
            <label ><h5>SEGUIMIENTO </h5></label>
          </figure>        
          <h6>DATOS PERSONALES DEL SOLICITANTE:</h6>
          <div class="table-responsive">
            <table class="table table-bordered" style="font-size:15px;" >
              <tbody>
                <!-- <tr>
                  <th>CODIGO DE SEGUIMIENTO:</th>
                  <td id="idSolicitud"></td>
                </tr> -->
              
                <tr>
                  <th>NOMBRE :</th>
                  <td id="nombreEstudianteSeguimiento"></td>
                </tr>
                <tr>
                  <th>APELLIDO PATERNO :</th>
                  <td id="apPatEstudianteSeguimiento"></td>
                </tr>
                <tr>
                  <th>APELLIDO MATERNO :</th>
                  <td id="apMatEstudianteSeguimiento"></td>
                </tr>
                <tr>
                  <th>CI:</th>
                  <td id="ciEstudianteSeguimiento"></td>
                </tr>
                <tr>
                  <th>MATRICULA:</th>
                  <td id="matriculaSeguimiento"></td>
                </tr>
                <tr>
                  <th>SEDE:</th>
                  <td id="sedeEstudianteSeguimiento"></td>
                </tr>
                <tr>
                  <th>CARRERA:</th>
                  <td id="carreraEstudianteSeguimiento"></td>
                </tr>
                <tr>
                  <th>CELULAR :</th>
                  <td id="celularEstudianteSeguimiento"></td>
                </tr>
    
              </tbody>
            </table>
          </div>
          <br>
          <div class="row">         
            <div class="table-responsive">
              <table class="table table-bordered" id="tablaSeguimiento" >
                <thead class="table-primary">
                  <tr>
                    <th>estado de seguimiento</th>
                    <th>Mensaje de evaluacion</th>
                    <th>Donde </th>
                    <th>fecha </th>
                  </tr>
                </thead>
                <tbody>
              

                </tbody>            
              </table>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
     <!-- <button type="submit" class="btn btn-primary" id="btnAgregar">Agregar</button>-->
      <button type="button" class="btn btn-danger" id="refresh" data-bs-dismiss="modal">Cerrar</button>
    </div> 
  </form>
  </div>
  </div>
</div>


