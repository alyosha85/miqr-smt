<div class="modal fade" id="edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Formular Änderung</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <!-- Search -->
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <input type="search" name="search_edit" placeholder="Suchen" id="search_edit" aria-describedby="button-addon1" class="form-control border-0 bg-light sform" value="{{ request()->input('search') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                        </div>
                        <div id="suggesstion-box"></div>
                    </div>
                    <span id="chksrchedit" class="ml-3"></span>
                </div>
                <form action="{{ route('item.update') }}" method="POST" class="item_edit_form">
                @csrf
                @method('PATCH')
                <!-- First row -->
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control invnr_edit" name="invnr" placeholder="Inventarnummer" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control andat_edit" name="andat" value=""  placeholder="Anschffungsdatum" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control kp_edit"  name="kp" placeholder="Kaufpreis" readonly>
                    </div>
                </div>
                <!-- Second row-->
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control standort_edit"  name="location_id" placeholder="Standort" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control raum_edit"  name="room_id" placeholder="Raum" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="ml-5">
                            <a href="" target="_blank" class="pdf_edit_green" style="display: none;">
                                <i class="fas fa-file-pdf fa-4x" style="color:green" data-toggle="tooltip" data-placement="top" title="Rechnung ansehen"></i>
                            </a>
                            <i class="far fa-file-pdf fa-4x pdf_edit_red" style="color:#d9534f" data-toggle="tooltip" data-placement="top" title="Keine Rechnung"></i>
                        </div>
                    </div>
                </div>
                <!-- Third row-->
                <div class="form-row mb-3">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control gart_edit"  name="gart_id" placeholder="Geräteart" readonly>
                    </div>
                    <div class="form-group col-md-3">
                            <input type="text" class="form-control gtyp_edit" name="gtyp" placeholder="Gerätetyp" readonly>
                    </div>
                        <input type="hidden" class="form-control path_to_rg" name="path_to_rg">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control sn_edit" name="sn" placeholder="Seriennummer" readonly>
                    </div>
                </div>
                <!-- Forth row -->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea class="form-control notes_edit" name="notes" rows="3" placeholder="Notizen" required></textarea>
                    </div>
                </div>
                <!-- End of Forth row -->
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                    <button type="submit" id="submit_form_edit" class="btn btn-primary submit_form_edit">Ändern</button>
                </div>
            </form>
        </div>
    </div>
</div>
