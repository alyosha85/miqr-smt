<div class="modal fade" id="add_man" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Formular manuell erfassung</h5>
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
                        <input type="text" class="form-control andat_man" name="andat"  placeholder="Anschffungsdatum" required>
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
                    <select id="rooms_id_man" name="room_id" class="form-control" required>
                    </select>
                </div>
            </div>
            <!-- Third row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-3">
                    <select id="gart_id_man" name="gart_id" class="form-control" required>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control gtyp_man" name="gtyp" placeholder="Gerätetyp" required>
                </div>
                <input type="text" class="form-control path_to_rg_man" id="path_to_rg_man" name="path_to_rg">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control gname_man" name="gname" placeholder="Gerätename" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control sn_man" name="sn" placeholder="Seriennummer">
                </div>
            </div>
            <!-- Forth row -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea class="form-control notes_man" name="notes" rows="3" placeholder="Notizen"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
            <button type="button" class="btn btn-primary submit_form_ajax_man">Einfügen</button>
            {{-- <button type="submit" class="btn btn-primary submit_form_man">Einfügen</button> --}}
        </div>
        </form>
          <div class="panel-body">
            <form id="dropzoneForm_man" class="dropzone" action="{{ route('dropzone.upload_pdf') }}">
              @csrf
            </form>
          </div>
    </div>
    </div>
</div>
