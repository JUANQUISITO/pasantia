<?php include 'Views/Template/header_lateral.php'; ?>
<!-- Begin Page Content     MODAL-->
<div class="">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                <form method="post" action="<?php echo base_url(); ?>TipoConvenios/actualizar" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="idTipoConvenio" value="<?php echo $data['id_tipo_convenio']; ?>" > 
                            <label for="nombre_tipo">Tipo de Convenio</label>
                            <input id="tipoConvenio" class="form-control" type="text" name="tipoConvenio" placeholder="Tipo de Convenio" value="<?php echo $data['nombre_tipo']; ?>" required>
                        </div>

                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción" value="<?php echo $data['descripcion_tipo']; ?>">
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label for="tipoConvenio">Tipo de Convenio</label>
                                            ----<input id="tipoConvenio" class="form-control" type="text" name="tipoConvenio" placeholder="Tipo de Convenio" value="<?php echo $data['tipoConvenio']; ?>">----
                                            <select class="form-select" aria-label="Default select example" id="tipoConvenio" name="tipoConvenio">
                                                <option selected>Seleccione una opcion </option>
                                                <option value="Empresarial" <?php if ($data['tipoConvenio'] == "Empresarial") {
                                                                        echo "selected";
                                                                    } ?>>Empresarial</option>
                                                <option value="Interinstitucional" <?php if ($data['tipoConvenio'] == "Interinstitucional") {
                                                                            echo "selected";
                                                                        } ?>>Interinstitucional</option>
                                            </select>
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <input id="estado" class="form-control" type="text" name="estado" placeholder="Estado" value="<?php echo $data['estado']; ?>">
                                        </div>

                                    
                                        
                                        <div class="card-footer">

                                            <button class="btn btn-primary"  type="submit"><i class="fas fa-save"></i> Registrar</button>
                                           
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                                        </div>
                                    </div>    
                                </form>                    
                </div>
            </div>
        </div>
    </section>
</div>
