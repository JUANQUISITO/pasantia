<?php require_once 'Views/Template/header_lateral.php'; ?>
<div class="card">
  <div class="card-header card-header-primary">
    FORMULARIO PRI-100
  </div>
  <div class="card-body">
    <div class="container">
        <div class="p-3 mb-2 bg-ss">
          <div class="col-lg-6 ml-auto">
            <?php if (isset($alert['mensaje'])) {
                if ($alert['mensaje'] == "modificado") { ?>
            <div class="alert alert-primary" role="alert">
              <strong>Datos Modificado</strong>
            </div>
            <?php } else { ?>
              <div class="alert alert-danger" role="alert">
                <strong>Error al Actualizar</strong>
              </div>
            <?php }
            } ?>
          </div>
            <figure class="text-center">
              <h2><strong>FORMULARIO PRI-100</strong></h2>
            </figure>
            <br>
        
            <h4><u>DATOS PERSONALES</u></h4><br>
            <!--  <form  method="post" action="<?php echo base_url(); ?>SolicitudPasantias/autocompletar" autocomplete="off">-->
              <form  method="post" action="<?php echo base_url(); ?>SolicitudPasantias/ListarPri100" autocomplete="off">
                <div class="row" >
                  <div class="col">
                    <label for="practicante" class="">Practicante</label>
                    <input type="text" class="form-control" id="practicante" name="practicante"  value  >
                  </div>
                  <div class="col">
                  <label for="carnet" class="">C.I.</label> 
                    <input type="text" class="form-control" id="carnet" name="carnet" >
                  </div>
                </div>
                <div class="row ">
                  
                  <div class="col">
                    <label for="carrera" class="">Carrera</label>
                    <input type="text" class="form-control" id="carrera" name="carrera" >
                  </div>
                  
                  <div class="col">
                    <label for="nivel" class="">Nivel</label>
                    <input type="text" class="form-control" id="nivel" name="nivel">
                     <!--<select class="form-select" aria-label="Default select example" id="nivel">
                      <option selected>Elija</option>
                      <option value="1">4to Semestre</option>
                      <option value="2">5to Semestre</option>
                      <option value="3">6to Semestre</option>
                    </select>-->
                  </div>
                </div>
                <div class="row ">                  
                  <div class="col">
                    <label for="domicilio" class="">Domicilio</label>
                    <input type="text" class="form-control" id="domicilio" name="domicilio">
                  </div>
                  
                  <div class="col">
                    <label for="telefono" class="">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col">
                    <label for="nombreApoderado" class="">Padre o apoderado</label>
                    <input type="text" class="form-control" id="nombreApoderado" name="nombreApoderado">
                  </div>
                  
                  <div class="col">
                    <label for="ciApoderado" class="">C.I.</label>
                    <input type="number" class="form-control" id="ciApoderado" name="ciApoderado">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col">
                    <label for="domicilioApoderado" class="">Domicilio</label>
                    <input type="text" class="form-control" id="domicilioApoderado" name="domicilioApoderado">
                  </div>
                  
                  <div class="col">
                    <label for="telefonoApoderado" class="">Telefono</label>
                    <input type="tel" class="form-control" id="telefonoApoderado" name="telefonoApoderado">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col">
                    <label for="fechaAutorizacion" class="">Fecha de Autorizacion Carrera</label>
                    <input type="date" class="form-control" id="fechaAutorizacion" name="fechaAutorizacion">
                  </div>
                  
                  <div class="col">
                    <label for="fechaEnvio" class="">Fecha de envio de carta a Empresa</label>
                    <input type="date" class="form-control" id="fechaEnvio" name="fechaEnvio">
                  </div>
                </div>
                <br>
              <hr>

                <h4><u>DATOS DE LA EMPRESA</u></h4>
              
                <div class="row"> 
                  <div class="col">
                    <label for="nombreEmp" class="">Nombre o Razon Social</label>
                    <input type="text" class="form-control" id="nombreEmp" name="nombreEmp">
                  </div>
                  
                  <div class="col">
                    <label for="direccionEmp" class="">Direccion</label>
                    <input type="text" class="form-control" id="direccionEmp" name="direccionEmp">
                  </div>
                </div>
               
                <div class="row">
                  
                  <div class="col">
                    <label for="telefonoEmp" class="">Telefono</label>
                    <input type="text" class="form-control" id="telefonoEmp" name="telefonoEmp">
                  </div>
                  
                  <div class="col">
                    <label for="fax" class="">Fax</label>
                    <input type="text" class="form-control" id="fax" name="fax">
                  </div>
                
                </div>
                <div class="row">
                  
                  <div class="col">
                    <label for="nombreDes" class="">Nombre del Destinatario</label>
                    <input type="text" class="form-control" id="nombreDes" name="nombreDes">
                  </div>
                  
                  <div class="col">
                    <label for="cargo" class="">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo">
                  </div>
                </div>
                <br>
                <div class="row ">
                  
                  <div class="col">
                    <label for="fechaIniPrac" class="">Fecha Inicio de la Practica</label>
                    <input type="text" class="form-control" id="fechaIniPrac" name="fechaIniPrac">
                  </div>
                  
                  <div class="col">
                    <label for="seccion" class="">Seccion de Inicio de la Practica</label>
                    <input type="text" class="form-control" id="seccion" name="seccion">
                  </div>
                </div>
                <br>
                <div class="row ">
                  
                  <div class="col">
                    <label for="cargoPrac" class="">Cargo</label>
                    <input type="text" class="form-control" id="cargoPrac" name="cargoPrac">
                  </div>
                  
                  <div class="col">
                    <label for="fechaConcluPrac" class="col">Fecha de Conclusion de la Practica</label>
                    <input type="text" class="form-control" id="fechaConcluPrac" name="fechaConcluPrac">
                  </div>
                </div>
               
                <br>
                <div class="row ">
                  
                  <div class="col">
                    <label for="tiempoDuracion" class="">Tiempo de duracion de la Practica</label>
                    <input type="text" class="form-control" id="tiempoDuracion" name="tiempoDuracion">
                  </div>
                 
                  <div class="col">
                    <label for="obser" class="">Observaciones</label>
                    <input type="text" class="form-control" id="obser" name="obser">
                  </div>
                </div>
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <br><button class="btn btn-primary " type="submit">Convertir en PDF</button><br><br>
                  <br><button class="btn btn-danger "  href="<?php echo base_url(); ?>SolicitudPasantias/sigForm" type="button" >Siguiente</button><br><br>
                </div>
              </form>
          </div>
    </div>
  </div>
</div>
<?php include 'Views/Template/foot.php'; ?>	
		