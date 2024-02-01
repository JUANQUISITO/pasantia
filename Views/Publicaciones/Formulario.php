<?php include 'Views/Template/header_lateral.php'; ?>
<div class="card">
  <div class="card-header card-header-primary">
  <a class="btn btn-info" href="<?php echo base_url(); ?>Publicaciones/Listar"><i class="bi bi-arrow-left-circle-fill"></i>Atras</a>
    
  </div>
  
  <div class="card-body">
    <div class="container" >
        <div class="row">
                <div class="col " >
                    <h6>PUBLICACIONES</h6>
                    <div class="login-form  mt-4 p-4"   >
                        <form action="<?php echo base_url(); ?>Publicaciones/insertar" method="post" class="row g-3">
                            <!--
                            <h4 class='text-center' id="titulo" ><strong>DATOS DE LA EMPRESA</strong></h4>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Nombre</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                                    <input type="text" name="username" class="form-control" placeholder="Ingrese el nombre de la empresa" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>-->

               
                            <h4 class='text-center'  ><strong>PUBLICACION</strong></h4>
                            <hr>
                            
                            <input type="hidden" name="idPublicacion" id="idPublicacion" >

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label ><strong>Titulo de la Pasantia</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-laptop-fill"></i></div>
                                    <input type="text" name="titulo" class="form-control" placeholder="Ejemplo: Empresa ENFE requiere pasantes de Informatica" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Institucion</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-bank"></i></div>
                                    <input type="text" name="institucion" class="form-control" placeholder="Nombre de la empresa o institucion" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Direccion</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-building"></i></div>
                                    <input type="text" name="direccion" class="form-control" placeholder="Ingrese la direccion de la empresa" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>

                            <!--
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Tipo de Pasantia</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-card-checklist"></i></div>
                                    <input type="text" name="tipoPasantia" class="form-control" placeholder="Tipo de pasantia" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>
                         
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label><strong>Área</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-wallet2"></i></div>
                                    <input type="text" name="area" class="form-control" placeholder="Ejemplo : Electronica o Electrica" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>
                            -->

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label><strong>Cantidad de Pasantes</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-list-ol"></i></div>
                                    <input type="number" name="cantPasantes" class="form-control" placeholder="cantidad de pasantes" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Remuneración</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-currency-dollar"></i></div>
                                    <input type="number" name="remuneracion" class="form-control" placeholder="Remuneración por la pasantia " >
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Beneficios</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-file-medical-fill"></i></div>
                                    <input type="text" name="beneficios" class="form-control" placeholder="Beneficios de la pasantía" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Tiempo de la pasantia(Duración)</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar2-day"></i></div>
                                    <input type="text" name="tiempoPasantia" class="form-control" placeholder="Ejemplo: 3 meses" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div> 

                            <div class="cform-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label><strong>Descripcion del puesto</strong> </label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-card-list"></i></div>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Describa el puesto de la pasantia">
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <label><strong>Carrera a la que va dirigida </strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-archive-fill"></i></div> 
                                    <select name="area" id="area" class="form-control" placeholder="seleccione la carrera" >
                                        <option value="inf">Todas</option>
                                        <option value="inf">Informatica Industrial</option>
                                        <option value="mec">Mecanica Industrial</option>
                                        <option value="elt">Electronica</option>
                                        <option value="elc">Electricidad Industrial</option>
                                        <option value="met">Metalurgia, Siderurgia y Fundicion</option>
                                        <option value="qmc">Quimica Industrial</option>
                                        <option value="mec_aut">Mecanica Automotriz</option>
                                        <option value="textil">Industria textil y confeccion</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <label><strong>Fecha límite de postulación</strong> </label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar2-month-fill"></i></div>
                                    <input type="date" name="fechaLimite" class="form-control" placeholder="Fecha limite hasta la que se puede postular">
                                </div>
                            </div> 

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <label><strong>Fecha de publicacion</strong> </label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-calendar2-month-fill"></i></div>
                                    <input type="date" name="fechaPublicacion" class="form-control" placeholder="Fecha en la que se realiza la publicacion">
                                </div>
                            </div>  
                            
                            <!--informacion de contacto-->
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Persona de contacto</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                                    <input type="text" name="contacto" class="form-control" placeholder="Ingrese el nombre de la empresa" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label ><strong>Número de contacto (Informaciones)</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-telephone-forward-fill"></i></div>
                                    <input type="tel" name="telContacto" class="form-control" placeholder="Ingrese el nombre de la empresa" required oninvalid="this.setCustomValidity('Por favor ingrese todos los datos')">
                                </div>
                            </div>

                            <div class="col-12">
                                <button href="<?php echo base_url() ?>Publicaciones/Listar"  class="btn btn-warning float-end">Publicar</button>
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>Publicaciones/Listar"><i class="bi bi-arrow-left-circle-fill"></i>Atras</a>
                            </div>
                        </form>

                        <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">¿Ya publico esta empresa? <a href="<?php echo base_url() ?>" class="text-blue" >Atras</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'Views/Template/foot.php'; ?>