<?php require_once 'Views/Template/plantilla.php'; ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>SolicitudPasantias/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Solicitud Pasantia</46>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="idSolPasantia" value="<?php echo $data['idSolicitarPasantia']; ?>" > 
                            <div class="form-group">
                                <label for="nombre">Fotocopia Titulo Bachiller</label>
                                <input id="fottitulobachiller" class="form-control" type="file" name="fottitulobachiller" value="<?php  echo $data['fotocopiaTituloBachiller']; ?>   ">
                                <td><embed src="../<?php echo $data['fotocopiaTituloBachiller']; ?>" type="application/pdf"/></td>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fotocopia Matricula </label>
                                <input id="fotocopiamatricula" class="form-control" type="file" name="fotocopiamatricula" value="<?php echo $data['fotocopiaMatricula']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="nombre">Formulario PRI-100</label>
                                <input id="formulariopricien" class="form-control" type="file" name="formulariopricien" value="<?php echo $data['fotocopiaPricien']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="nombre">mensaje</label>
                                <input id="mensaje" class="form-control" type="text" name="mensaje" value="<?php echo $data['mensaje'];?>">
                            </div>
        
                            
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>SolicitudPasantias/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
s