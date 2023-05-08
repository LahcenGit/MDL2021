<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Achat le : {{$achat->created_at->format('d M Y')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>

          </button>
        </div>
        <div class="modal-body">
        <table class="table table-bordered">
          <thead>
              <tr>
              <th scope="col">F</th>
              <th scope="col">D</th>
              <th scope="col">C</th>
              <th scope="col">S</th>
              <th scope="col">P</th>
              <th scope="col">W</th>
              <th scope="col">L</th>
              <th scope="col">T</th>
              <th scope="col">FP</th>
              <th scope="col">Acidité</th>
              </tr>
          </thead>
          <tbody>

              <tr>

              <td>{{$analyse->f}}</td>
              <td>{{$analyse->d}}</td>
              <td>{{$analyse->c}}</td>
              <td>{{$analyse->s}}</td>
              <td>{{$analyse->p}}</td>
              <td>{{$analyse->w}}</td>
              <td>{{$analyse->l}}</td>
              <td>{{$analyse->t}}</td>
              <td>{{$analyse->fp}}</td>
              <td>{{$analyse->a}}</td>

              </tr>


          </tbody>
          </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>

        </div>
      </div>
    </div>
  </div>
