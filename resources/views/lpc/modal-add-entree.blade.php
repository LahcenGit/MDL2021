<div class="modal" tabindex="-1" id="modal-add-entree">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter stock </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form class="cmxform" id="formAddEntree" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label> PDL 0%:</label>
                        <input type="text" placeholder="0.0 kg" class="form-control mb-4 mb-md-0 input-default mt-3" name="PDL0">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label> PDL 26%:</label>
                        <input type="text" placeholder="0.0 kg" class="form-control mb-4 mb-md-0 input-default mt-3" name="PDL26">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label>Film(P.L):</label>
                        <input type="text" placeholder="0.0 kg" class="form-control mb-4 mb-md-0 input-default mt-3" name="film">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="save" class="btn btn-primary" >Ajouter</button>
                <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
