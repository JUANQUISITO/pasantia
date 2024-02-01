
<!--LLAMNDO AL MODAL DE OLVIDAR CONTRASEÑA-->

<!-- <?php  
    getModal('loginModal',$data);
?> -->


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo media() ?>css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!--aqui vendria el include-->

<body>

    <div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5">
                <h3 class="text-center mb-3"></h3>
                <div class="bg-ligth shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-2" style="background-color:#FFDD00">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="" class="row g-4 needs-validation" id="frmlogin"  autocomplete="off">
                                        
                                    <div class="col-12">
                                        <label class=""><strong>Usuario<span class="text-danger"> </span></strong></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><ion-icon name="contact"></ion-icon></div>
                                            <input type="text" name="carnet" id="carnet" class="form-control " placeholder="Ingrese su usuario"  >
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label><strong>Contraseña<span class="text-danger">  </span></strong></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><ion-icon name="lock"></ion-icon></div>
                                            <input type="password" name="password" id="pass" class="form-control " placeholder="Ingrese su contraseña" >
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                            <label class="form-check-label" for="inlineFormCheck">Recuerdame</label>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-8">
                                        <a href="<?php echo base_url(); ?>Home/forgotpassword" onclick="modal_02();" class="float-end text-primary">¿Olvido su contraseña?</a>
                                    </div>
                                   
                                    <div class=" align-items-center " id="alerta" role="alert"></div>

                                    <div class="col-12">
                                        <p class="text-left mb-0"><strong><em>Descargue el Manual de Usuario  </em> </strong> <a href="<?php echo base_url(); ?>Assets/manualUsuariosPdf/DOCUMENTO1.pdf">Manual</a></p>
                                        <p class="text-left mb-0"><strong><em><u>SI USTED ES UN ALUMNO ANTIGUO Y NO TIENE CUENTA</u> </em> </strong> <a href="<?php echo base_url(); ?>Home/registrar">Registrese</a></p>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"  class="btn btn-primary px-3 float-end mt-4" id="liveAlertBtn">Ingresar</button>
                                    </div>                                            
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block" >
                            <div class="zoom form-right h-100  text-white text-center pt-5 "  style="background-color:#16088C">
                                <h4 class="fs-1"> <?= $data['page_title'];?> </h4>
                                <img src="<?php echo base_url() ?>Assets/img/EIS.png" class="imagen" width="200"
                                height="200" />
                                <h4 class="fs-1"> </h4>
                            </div>
                        </div>
                    </div>

                </div>
                <p class="text-end text-secondary mt-3"> Esta version es una version en desarrollo (beta)</p>
            </div>
        </div>
    </div>
    </div>
    
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script >
        const base_url = "<?php echo base_url();?>";
    </script>
    <script src="<?php echo media(); ?>js/<?=$data['page_functions_js']; ?>"></script>


</body>
</html>
