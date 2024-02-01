
<div class="modal" id="modalVerConvenio"   aria-labelledby="nueva_soliLabel" aria-hidden="true" >
    <div class="modal-dialog modal-md ">

        <div class="modal-content">
            <div class="modal-header header-color">
                <h4 class="modal-title text-white" id="exampleModalLabel" >Ver Convenio</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>         
            </div>

            <form method="post" id="formConvenio" action="<?php echo base_url(); ?>Convenios/insertar" autocomplete="off" enctype='multipart/form-data'>
                <div class="modal-body">
                    <input type="hidden" name="idVerConvenio" id="idVerConvenio"  >
                    <figure class="text-center">
                        <label ><h5>CONVENIO </h5></label>
                    </figure>        
                    <h6><strong>DATOS :</strong></h6>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="font-size:15px;border: blue 2px solid;" >
                            <tbody>
                                <tr>
                                    <th>CODIGO DEL CONVENIO:</th>
                                    <td id="verCodigoConvenio"></td>
                                </tr>
                                <tr>
                                    <th>EMPRESA :</th>
                                    <td id="verEmpresaConvenio"></td>
                                </tr>
                                <tr>
                                    <th>TIPO DE CONVENIO :</th>
                                    <td id="verTipoConvenio"></td>
                                </tr>
                                <tr>
                                    <th>FECHA DE INICIO DEL CONVENIO:</th>
                                    <td id="verFechaInicioConvenio"></td>
                                </tr>
                                <tr>
                                    <th>FECHA DE FINAL DEL CONVENIO:</th>
                                    <td id="verFechaFinalConvenio"></td>
                                </tr>       
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-12 col-xs-12 " id="convenioReset">
                        <label for="nombre">Convenio PDF</label>
                    
                        <div class="col-12" id="pdfVerConvenio" ></div>
                        <div id="btnpdfVerConvenio"></div>
                    
                    </div>
                </div>               
                <div class="modal-footer">                         
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal" ><i class="fas fa-window-close"></i> Cerrar</button>
                </div>  
            </form>
        </div>
    </div>
</div>

<!--     MODAL PARA VER EL ARCHIVO PDF-->
<!-- <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> -->