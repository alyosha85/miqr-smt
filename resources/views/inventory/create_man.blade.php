<div class="modal fade" id="add_man" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Formular manuell Erfassung</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('item.storeMan') }}" method="POST" id="item_form_man">
            @csrf
            <!-- First row -->
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control invnr_man" name="invnr" placeholder="Inventarnummer" required>
                </div>
                <div class="form-group col-md-4">
                        <input type="text" class="form-control date_man" name="andat"  placeholder="Anschffungsdatum" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control kp_man"  name="kp" placeholder="Kaufpreis" required>
                </div>
            </div>
            <!-- Second row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <select id="location_id_man" name="location_id" class="form-control" required>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select id="rooms_man" name="room_id" class="form-control" required>
                    </select>
                </div>
            </div>
            <!-- Third row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-3">
                    <select id="gart_id_man" name="gart_id" class="form-control" required>
                        <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="gtyp_man" name="gtyp" placeholder="Gerätetyp" required>
                </div>
                <input type="hidden" class="form-control path_to_rg_man" id="path_to_rg_man" name="path_to_rg">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="gname_man" name="gname" placeholder="Gerätename" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="sn_man" name="sn" placeholder="Seriennummer" required>
                </div>
            </div>
            <!-- Forth row -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea class="form-control" id="notes_man" name="notes" rows="3" placeholder="Notizen"></textarea>
                </div>
            </div>
            <!-- End of Forth row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success submit_form_ajax_man" style="visibility:hidden;">Einfügen</button>
          <button type="submit" class="btn btn-success submit_form_man">Einfügen</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Verwerfen</button>
        </div>
    </form>
           <div class="panel-body">
            <form id="dropzoneFormMan" class="dropzone" action="{{ route('dropzone.upload_pdf_man') }}">
              @csrf
            </form>
          </div>
        <br />
        <div class="panel panel-default">
          <div class="panel-body" id="uploaded_pdf_man">
          </div>
        </div>
    </div>
    </div>
</div>
