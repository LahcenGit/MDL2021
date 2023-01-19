<div class="modal" tabindex="-1" id="showModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détail commande</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
           @foreach($orderlines as $orderline)
            <div class="row">
                   <div class="col-md-6">
                       <label> Produit:</label>
                       <input type="text"  class="form-control invalid" value="{{$orderline->product->designation}}" disabled>

                    </div>

                   <div class="col-md-3">
                       <label>Qte:</label>
                       <input type="text"  class="form-control invalid"value="{{$orderline->qte}} kg"disabled >
                   </div>
                   <div class="col-md-3">
                       <label>Total:</label>
                       <input type="text"  class="form-control invalid"value="{{$orderline->total}}" disabled>
                   </div>
               </div>
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
