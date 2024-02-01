<?php require_once 'Views/Template/header_lateral.php'; ?>
<!-- Begin Page Content -->

<div class="card">
    <div class="card-header card-header-primary">
       LISTA DE PASANTÍAS APROBADAS
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                            
                                <div class="col-lg-6 mb-2">
                                <!-- <?php if($_SESSION['rol'] != "Administrador"){ ?> -->
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nueva_soli"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>SolicitudPasantias/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                                    <!-- <?php } ?> -->
                                    <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>SolicitudPasantias/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                                </div>
                                
                                <div class="col-lg-6">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>la solicitud ya existe</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Solicitud enviada</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Solicitud actualizada</strong>
                                            </div>
                                        <?php } else if ($alert == "eliminar") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Solicitud Eliminada</strong>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="example">
                                    <thead class="table-primary">
                                        <tr>  
                                            <th>#</th>
                                            <th>Solicitudes</th>
                                            <th>Nombre Completo</th>
                                            <th>Mensaje</th>
                                            <th>Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c=0; foreach ($data as $cl) { $c++; ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $cl['apellidoPat']; ?></td>
                                                <td><?php echo $cl['apellidoMat']; ?></td>
                                                <td><?php echo $cl['carnet']; ?></td>
                                                <td><?php echo $cl['nroMatricula']; ?></td>
                                                <td><embed src="../<?php echo $cl['fotocopiaTituloBachiller']; ?>" type="application/pdf"/></td>
                                                <td><embed src="../<?php echo $cl['fotocopiaMatricula']; ?>" type="application/pdf"/></td>
                                                <td><embed src="../<?php echo $cl['formularioPricien']; ?>" type="application/pdf"/></td>
                                                <td><?php echo $cl['mensaje']; ?></td>
                                                <td> 
                                                    <a href="<?php echo base_url() ?>SolicitudPasantias/editarSolicitd?idSolicitarPasantia=<?php echo $cl['idSolicitarPasantia']; ?>" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> </a>
                                                <form action="<?php echo base_url() ?>SolicitudPasantias/eliminar?idSolicitarPasantia=<?php echo $cl['idSolicitarPasantia']; ?>" method="post" class="d-inline elim">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></form></td>
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
  <!--MODAL SOLICITUD-->

    <!-- Modal -->

<div class="modal fade" id="nueva_soli" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="nueva_soliLabel" aria-hidden="true" >
    <div class="modal-dialog">    
        <div class="modal-content">
            <div class="modal-header " style="background-color: #47A8BD;">
                <h5 class="modal-title text-white"id="nueva_soliLabel"><i class="fas fa-clipboard-list"></i> Solicitud Pasantias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>SolicitudPasantias/insertar" enctype="multipart/form-data"  autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="text" id="codigo" class="form-control" name="codigo" placeholder="codigo">
                    </div>                 
                    <div class="form-group">
                        <label for="nombre">Fotocopia Titulo Bachiller</label>
                        <input id="fottitulobachiller" class="form-control" type="file" name="fottitulobachiller" placeholder="Fotocopia Titulo Bachiller">        
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <img src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                    </div>
                   
                    <div class="form-group">
                        <label for="nombre">Fotocopia Matricula </label>
                        <input id="fotocopiamatricula" class="form-control" type="file" name="fotocopiamatricula" placeholder="Fotocopia Matricula">
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <img src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                    </div>
                    
                    <div class="form-group">
                        <label for="nombre">Formulario PRI-100</label>
                        <input id="formulariopricien" class="form-control" type="file" name="formulariopricien" placeholder="Formulario PRI-100">
                        <p class="help-block">Peso máximo de la imagen 4MB</p>
                        <img src="<?php echo base_url(); ?>Assets/pdfs/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                    </div>
                    
                    <div class="form-group">
                        <label for="nombre">mensaje</label>
                        <input id="mensaje" class="form-control" type="text" name="mensaje" placeholder="mensaje">
                    </div>

                   
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Solicitar Pasantia</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'Views/Template/foot.php'; ?>