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
            <div class="col-md-4 offset-md-4" >
                <div class="login-form  mt-4 p-4" >
                    <form action="post" method="" class="row g-3" id="forgotpass">
                        <h4 class='text-center'>Restaurar Contraseña</h4>
                        <hr class="mt-1">
                        <div class="form-group col-12">
                            <label ><strong>Introduzca su correo institucional</strong></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                <input type="email" name="email_insti" class="form-control" placeholder="Ingrese su correo institucional" required oninvalid="this.setCustomValidity('Ingrese su correo')">
                            </div>
                        </div>

<!--
                        <div class="col-12">
                            <label >C.I.</label>
                            <input type="number" name="username" class="form-control" placeholder="Ingrese su carnet" required oninvalid="this.setCustomValidity('Ingrese su numero de carnet')">
                        </div>

                        <div class="col-12">
                            <label>Nueva Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="fecha de nacimiento" required oninvalid="this.setCustomValidity('No puede quedar vacio')">
                        </div>
                        <div class="col-12">
                            <label>Repita la nueva Contraseña</label>
                            <input type="password" name="password_1" class="form-control" placeholder="nueva contraseña" required oninvalid="this.setCustomValidity('No puede quedar vacio')">
                        </div>
-->
                     
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Recuerdame</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning float-end">Enviar</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center text-white mb-0">¿Ya tiene cuenta? <a href="<?php echo base_url() ?>" class="text-white" >Loguearse</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>
