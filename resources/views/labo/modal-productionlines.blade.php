<div class="modal" tabindex="-1" id="modal-production-line">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détail production  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Qte</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($productionlines as $productionline)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td >{{ $productionline->product->soft_name }} {{ $productionline->product->capacity }}</td>
                        <td>{{ $productionline->qte }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer" style="border-top:0px">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
