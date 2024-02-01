

<!-- Modal -->
<div class="modal fade" id="SolicitdCompletarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Completar Pasantia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="concluirPasantia" method="POST" >
                <input type="hidden" name="idSolicitudConcluida" id="idSolicitudConcluida">
                <input type="hidden" name="idCarreraSedeConcluida" id="idCarreraSedeConcluida">
                <div class="form-check align center" >
                        <input class="form-check-input" type="checkbox" value="completado" name="CheckPasantia" id="CheckPasantia">
                        <label class="form-check-label" for="flexCheckDefault">
                            Si los datos son completados
                        </label>
                </div>
                <div class="mb-3">
                    <label for="message-text"  class="col-form-label">Message:</label>
                    <textarea class="form-control" name="mensajeConcluido" id="message-text"></textarea>
                </div>
      </div>
      <div class="modal-footer align center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" id="btn-concluir" class="btn btn-primary">Guardar Cambios</button>
      </div>
      </form>

    </div>
  </div>
</div>
