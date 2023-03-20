<div class="modal" tabindex="-1" id="modal-order-line">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détail commande  </h5><h5 style="color:#6FB53E">({{ $order->code }})</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Capacité</th>
                    <th scope="col">Qte</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($orderlines as $orderline)
                    <tr >
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td >{{ $orderline->product->soft_name }} </td>
                        <td >{{ $orderline->product->capacity }} </td>
                        <td>{{ $orderline->qte }}</td>
                        <td>{{ number_format($orderline->total) }} Da</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><b>Total</b></td>
                        <td style="color:#6FB53E;"><b>{{ number_format($total,2) }} Da</b></td>
                    </tr>
                </tbody>
              </table>
        </div>
        <div class="modal-footer" style="border-top:0px">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
