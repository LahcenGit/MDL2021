<div class="modal" tabindex="-1" id="showModalD">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Veuillez choisir le livreur !</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form id="sbmitF">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label> Livreurs:</label>
                        <select type="text"  class="form-control invalid"  id="delivry">
                            @foreach($delivries as $delivry)
                                <option value="{{ $delivry->id }}">{{ $delivry->name }}</option>

                            @endforeach
                        </select>
                        <input type="hidden" value="{{ $order->id }}" id="order">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit" class="btn btn-primary" data-bs-dismiss="modal">Ajouter</button>
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
