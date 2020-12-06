<div class="modal fade" id="invalid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formular Ausmusterung Inventargut</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

            <!-- Search -->
                    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                            <input type="search" name="search" placeholder="Suchen" id="search_amg" aria-describedby="button-addon1" class="form-control border-0 bg-light sform" value="{{ request()->input('search') }}">
                            <div class="input-group-append">
                            <button id="srch_button" type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <span id="chksrch"></span>
                    <div class="container">
                    <!-- Small boxes (Stat box) -->
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <form action="{{ route('invalid') }}" method="POST" class="amg_form">
                                @csrf
                                <!-- First row -->
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control gname_amg" placeholder="Gerätename" data-toggle="tooltip" data-placement="top" title="Gerätename" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control inventarnummer_amg" name="invnr" placeholder="Inventarnummer" readonly
                                        data-toggle="tooltip" data-placement="top" title="Inventarnummer">
                                    </div>

                                    <div class="form-group col-md-3">
                                            <input type="date" class="form-control andat_amg" placeholder="Anschaffungsdatum" readonly
                                            data-toggle="tooltip" data-placement="top" title="Anschaffungsdatum">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control kp_amg" placeholder="Kaufpreis" readonly
                                        data-toggle="tooltip" data-placement="top" title="Kaufpreis">
                                    </div>
                                </div>
                                <!-- End of First row-->
                                <!-- Second row-->
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control standort_amg" placeholder="Standort" data-toggle="tooltip" data-placement="top" title="Standort" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control raum_amg" placeholder="Raum" data-toggle="tooltip" data-placement="top" title="Raum" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="grund" name="grund" class="form-control" required>
                                        </select>
                                    </div>
                                </div>
                                <!-- End of Second row-->
                                <!-- Third row-->
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control gart_amg" placeholder="Geräteart" data-toggle="tooltip" data-placement="top" title="Geräteart" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                            <input type="text" class="form-control gtyp_amg" placeholder="Gerätetyp" data-toggle="tooltip" data-placement="top" title="Gerätetyp" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control sn_amg" placeholder="Seriennummer" readonly
                                        data-toggle="tooltip" data-placement="top" title="Seriennummer">
                                    </div>
                                </div>
                                <!-- End of Third row-->
                                <!-- Forth row -->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" name="notes" rows="3" placeholder="Notizen" data-toggle="tooltip" data-placement="top" title="Notizen"></textarea>
                                    </div>
                                </div>
                                <!-- End of Forth row -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">verwerfen</button>
                                    <button type="submit" class="btn btn-primary">Ausmustern</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 mt-5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



