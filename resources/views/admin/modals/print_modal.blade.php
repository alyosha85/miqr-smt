<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formular Druck Inventarnummern</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <select id="address" class="form-control">
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control inventNumber" id="inventNumber" placeholder="Inventarnummer" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" id="anzahl" placeholder="Anzahl">
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">verwerfen</button>
          <button type="button" class="btn btn-primary">Drucken</button>
        </div>
      </div>
    </div>
  </div>


  
