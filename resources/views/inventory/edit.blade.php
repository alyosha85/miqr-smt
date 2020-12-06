<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formular Änderung</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ url('/search_edit') }}" type="get" id="item_edit">
            @csrf
            <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
            <div class="input-group">
                <input type="search" name="search_edit" placeholder="Suchen" id="search_edit" aria-describedby="button-addon1" class="form-control border-0 bg-light sform" value="{{ request()->input('search') }}">
                <div class="input-group-append">
                    <button type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <span id="chksrchedit"></span>
            </div>
        </form>
        <form action="" method="POST" class="item_edit_form">
            @csrf
            <!-- First row -->
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control invnr_edit" name="invnr" placeholder="Inventarnummer" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control date_edit" name="andat" value=""  placeholder="Anschffungsdatum" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control kp_edit"  name="kp" placeholder="Kaufpreis">
                </div>
            </div>
            <!-- End of First row-->
            <!-- Second row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <select name="location_id" class="form-control standort_edit">
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select name="room_id" class="form-control raum_edit">
                    </select>
                </div>
            </div>
            <!-- End of Second row-->
            <!-- Third row-->
            <div class="form-row mb-3">
                <div class="form-group col-md-3">
                    <select id="gart_id" name="gart_id" class="form-control gart_edit" required>
                        <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                        <input type="text" class="form-control gtyp_edit" name="gtyp" placeholder="Gerätetyp">
                </div>
                <input type="hidden" class="form-control path_to_rg" name="path_to_rg">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control gname_edit" name="gname" placeholder="Gerätename">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control sn_edit" name="sn" placeholder="Seriennummer">
                </div>
            </div>
            <!-- End of Third row-->
            <!-- Forth row -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea class="form-control notes_edit" name="notes" rows="3" placeholder="Notizen"></textarea>
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
          {{-- <div class="panel-body">
            <form id="dropzoneForm" class="dropzone" action="{{ route('dropzone.upload_pdf') }}">
              @csrf
            </form>
          </div> --}}
        <br />
        <div class="panel panel-default">
          <div class="panel-body" id="uploaded_pdf">
          </div>
        </div>
    </div>
    </div>
</div>
