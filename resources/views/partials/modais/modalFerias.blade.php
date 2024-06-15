

<div class="modal fade" id="feriasModal" tabindex="-1" aria-labelledby="modalVisualizarFerias" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3" id="modalVisualizarFerias">Visualizar férias  <i class="fa-solid fa-calendar"></i></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="form-group row">
          <div class="col-sm-6">
            <label class="form-label">Título <i class="fa-solid fa-file-lines disable"></i></label>
            <input type="text" class="form-control" id="modalTitulo" readonly>
          </div>
        
          <div class="col-sm-6">
            <label class="form-label">Local das férias <i class="fa-solid fa-map-location-dot"></i></label>
            <input type="text" class="form-control" id="local" readonly>
          </div>
        </div>

        <div class="form-group row mb-3">
          <div class="col-sm-6">
            <label class="form-label">Data de início das férias <i class="fa-solid fa-plane-departure"></i></label>
            <input type="text" class="form-control" id="modalDataInicio" readonly>
          </div>

          <div class="col-sm-6">
            <label class="form-label">Data de retorno das férias <i class="fa-solid fa-plane-arrival"></i></label>
            <input type="text" class="form-control" id="modalDataRetorno" readonly>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-12">
            <label class="form-label">Observação <i class="fa-solid fa-file-circle-plus"></i></label>
            <textarea class="form-control" id="observacao" rows="6" readonly></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar  <i class="fa-solid fa-x"></i></button>
      </div>
    </div>
  </div>
</div>
