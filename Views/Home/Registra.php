<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pasantias</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="<?php echo base_url() ?>Assets/css/style1.css" rel="stylesheet">
</head>
<body >

    <div class="container" >
        <div class="row">
            <div class="col offset-md-4" >
                <div class="login-form  mt-4 p-4"   >
                    <form  method="POST" id="registro_estudiantes" class="row g-3">
                        <h4 class='text-center' id="titulo" ><strong>REGISTRO</strong></h4>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label ><strong>Nombres</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                                <input type="text" name="username" class="form-control" placeholder="Ingrese su nombre o nombres" required >
                            </div>
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label ><strong>C.I</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-card-heading"></i></div>
                                <input type="text" name="ci" class="form-control" placeholder="carne de identidad " required >
                            </div>
                        </div>


                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label ><strong>Apellido Paterno</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-person-check-fill"></i></div>
                                <input type="text" name="ap_pat" class="form-control" placeholder="apellido paterno" required >
                            </div>
                        </div>

                      <!--  <div class="col-12">
                            <label><strong>Contraseña</strong></label>
                            <input type="date" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('No puede quedar vacio')">
                        </div>-->
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label><strong>Matricula</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-wallet2"></i></div>
                                <input type="number" name="matricula" class="form-control" placeholder="Matricula" required >
                            </div>
                        </div>
                        

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label ><strong>Apellido Materno</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-person"></i></div>
                                <input type="text" name="ap_mat" class="form-control" placeholder="apellido materno" required >
                            </div>
                        </div> 

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label><strong>Seleccione su carrera</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-archive-fill"></i></div> 
                                <select name="carrera" id="carrera" class="form-control" placeholder="seleccione su carrera" >
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
                            <label><strong>Correo</strong> </label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                <input type="email" name="email" class="form-control" placeholder="email" required>
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label><strong>Correo Alternativo</strong> </label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                <input type="email" name="email_alt" class="form-control" placeholder="email alternativo">
                            </div>
                        </div>

                        <!--informacion de contacto-->
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label><strong>Telefono</strong> </label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-telephone-fill"></i></div>
                                <input type="tel" name="tel" class="form-control" placeholder="número de contacto" required>
                            </div>
                        </div>  

                        <div class="cform-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label><strong>Dirección</strong> </label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-house-door-fill"></i></div>
                                <input type="text" name="direccion" class="form-control" placeholder="dirección" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning float-end">Registrarse</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">¿Ya tiene cuenta? <a href="<?php echo base_url() ?>" class="text-white" >Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>    
	<!-- funciones -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script> const base_url = "<?= base_url(); ?>"; </script>
	<script src="<?php echo media();?>js/functions_registro.js"></script>

</body>
</html>
