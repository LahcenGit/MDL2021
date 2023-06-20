<div class="modal" tabindex="-1" id="modalStatusOrder">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier statut </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form id="sbmitF">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label> Statut:</label>
                        <select type="text"  class="form-control invalid"  id="status">
                            <option value="1" @if ($order->status == 1) selected @endif > En attente</option>
                            <option value="2" @if ($order->status == 2) selected @endif > Validé</option>
                            <option value="3" @if ($order->status == 3) selected @endif > Livraison...</option>
                            <option value="4" @if ($order->status == 4) selected @endif > Livré</option>
                            <option value="5" @if ($order->status == 5) selected @endif > Annulé</option>
                        </select>
                        <input type="hidden" value="{{ $order->id }}" id="order">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="save" class="btn btn-primary" >Enregistrer</button>
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
