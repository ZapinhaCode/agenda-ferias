<div class="modal fade" id="sugerirAlteracao" tabindex="-1" role="dialog" aria-labelledby="modalSugerirAlteracao" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="modalSugerirAlteracao">Sugerir alteração  <i class="fa-regular fa-pen-to-square"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @if (isset($feria))
                <div class="modal-body">
                    <form action="{{ route('adm.ferias.solicitaAlteracao', $feria->id) }}" method="POST" class="loading-form">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="message-text" class="col-form-label">Motivo da alteração  <i class="fa-solid fa-comment"></i></label>
                            <textarea class="form-control" rows="6" id="message-text" name="solicitacao"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary loading-button" data-bs-dismiss="modal">Fechar  <i class="fa-solid fa-x"></i></button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Enviar e-mail <i class="fa-solid fa-envelope"></i></button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>