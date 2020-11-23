<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formular Erfassung</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('item.store') }}" method="POST" id="item_form">
            @csrf
            <!-- First row -->
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control invnr" name="invnr" placeholder="Inventarnummer" readonly>
                </div>
                <div class="form-group col-md-4">
                        <input type="text" class="form-control date" name="andat"  placeholder="Anschffungsdatum">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control"  name="kp" placeholder="Kaufpreis" >
                </div>
            </div>
            <!-- End of First row-->
            <!-- Second row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <select id="location_id" name="location_id" class="form-control">
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select id="rooms" name="rname" class="form-control">
                    </select>
                </div>
            </div>
            <!-- End of Second row-->
            <!-- Third row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-3">
                    <select id="art" name="gart" class="form-control">
                        <option selected>Geräteart</option>
                        <option>Rechner</option>
                        <option>Laptop</option>
                        <option>Drucker</option>
                        <option>Beamer</option>
                        <option>Bildschirm</option>
                        <option>Tablet</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="gtyp" name="gtyp" placeholder="Gerätetyp">
                </div>
                <input type="hidden" class="form-control path_to_rg" id="path_to_rg" name="path_to_rg" placeholder="Gerätetyp">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="gname" name="gname" placeholder="Gerätename">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="sn" name="sn" placeholder="Seriennummer">
                </div>
            </div>
            <!-- End of Third row-->
            <!-- Forth row -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Notizen"></textarea>
                </div>
            </div>
            <!-- End of Forth row -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
            <button type="button" class="btn btn-primary submit_form_ajax" style="visibility:hidden;">Einfügen</button>
            <button type="submit" class="btn btn-primary submit_form">Einfügen</button>
        </div>
    </form>
          <div class="panel-body">
            <form id="dropzoneForm" class="dropzone" action="{{ route('dropzone.upload_pdf') }}">
              @csrf
            </form>
            {{-- <div align="center">
              <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div> --}}
          </div>
        <br />
        <div class="panel panel-default">
          <div class="panel-body" id="uploaded_pdf">
          </div>
        </div>
    </div>
    </div>
</div>



