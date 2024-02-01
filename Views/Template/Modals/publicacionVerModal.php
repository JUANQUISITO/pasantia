
<!-- Modal -->
<div class="modal fade" id="modalVerPublicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Publicacion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form method="post" action="<?php echo base_url(); ?>Publicaciones/verPubli" autocomplete="off">
                    <div class="modal-body">

                        <input type="hidden" name="idVerPublicacion" id="idVerPublicacion" >
                        <table class="table table-bordered" style="font-size:15px;border: #0D6EFD 2px solid;" >
                            <tbody>
                                <tr>
                                    <th><i class="bi bi-laptop-fill"></i>  Titulo de la Pasantia:</th>
                                    <td id="verTitulo"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-bank"></i>  Institucion/Empresa :</th>
                                    <td id="verInstitucion"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-bank"></i>  Direccion :</th>
                                    <td id="direccionPubli"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-list-ol"></i>  Cantidad de Pasantes :</th>
                                    <td id="verCantPasantes"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-currency-dollar"></i>  Remuneración:</th>
                                    <td id="verRemuneracion"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-file-medical-fill"></i>  Beneficios:</th>
                                    <td id="verBeneficios"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-calendar2-day"></i>  Tiempo de la pasantia(Duración):</th>
                                    <td id="tiempoPas"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-card-list"></i>  Descripcion del puesto:</th>
                                    <td id="verDescripcion"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-archive-fill"></i>  Carrera a la que va dirigida:</th>
                                    <td id="verArea"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-calendar2-month-fill"></i>   Fecha de Publicacion:</th>
                                    <td id="fechaPubli"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-calendar2-month-fill"></i>  Fecha límite de postulación:</th>
                                    <td id="fechaLim"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-person-circle"></i>  Persona de contacto:</th>
                                    <td id="contac"></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-telephone-forward-fill"></i>  Número de contacto (Informaciones):</th>
                                    <td id="telCon"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>     
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
