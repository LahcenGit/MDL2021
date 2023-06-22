<div class="modal" tabindex="-1" id="modal-add-note">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter note </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form id="sbmitF">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <label> Taches:</label>
                        @foreach($taches as $tache)
                        <input type="text" value="{{ $tache->tache->tache }}" data-id="{{ $tache->id }}" class="form-control mb-4 mb-md-0 input-default mt-3 tache-input" disabled>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <label> Note:</label>
                        @foreach($taches as $tache)
                        <input type="text" value="{{ $tache->note }}" class="form-control mb-4 mb-md-0 input-default mt-3 note-input" id="note-{{ $tache->id }}">
                        @endforeach
                    </div>
                </div>
                <input type="hidden" value="{{ $worker->id }}" id="worker">
            </div>
            <div class="modal-footer">
                <button type="button" id="save" class="btn btn-primary" >Enregistrer</button>
                <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
