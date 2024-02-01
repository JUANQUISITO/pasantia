<?php include 'Views/Template/header_lateral.php'; ?>
<!-- Begin Page Content     MODAL-->
<div class="">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                <form method="post" action="<?php echo base_url(); ?>Convenios/actualizar" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="idConvenio" value="<?php echo $data['idConvenio']; ?>" > 
                            <label for="codigo">Código</label>
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código" value="<?php echo $data['codigo']; ?>" required>
                        </div>

                                        <div class="form-group">
                                            <label for="empresa">Empresa</label>
                                            <input id="empresa" class="form-control" type="text" name="empresa" placeholder="Empresa" value="<?php echo $data['empresa_id_empresa']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="tipoConvenio">Tipo de Convenio</label>
                                            <!--<input id="tipoConvenio" class="form-control" type="text" name="tipoConvenio" placeholder="Tipo de Convenio" value="<?php echo $data['tipo_convenio_id_tipo_convenio']; ?>">-->
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

                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <input id="estado" class="form-control" type="text" name="estado" placeholder="Estado" value="<?php echo $data['estado']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="fechaInicio">Fecha de Inicio</label>
                                            <input id="fechaInicio" class="form-control" type="date" name="fechaInicio" placeholder="Fecha de Inicio" value="<?php echo $data['fecha_inicio']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="fechaFinal">Fecha Final</label>
                                            <input id="fechaFinal" class="form-control" type="date" name="fechaFinal" placeholder="Fecha Final" value="<?php echo $data['fecha_final']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="convenio_pdf">Cargar Convenio</label>
                                            <input id="convenio_pdf" class="form-control" type="file" name="convenio_pdf" placeholder="Cargue el pdf del convenio">
                                        </div>
                                    
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
