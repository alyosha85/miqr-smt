<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-4 mt-4"><!-- <h1 class="m-0 text-dark">H1 Header</h1> -->
                    <form action="{{ url('/search') }}" type="get">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                            <input type="search" name="search" placeholder="Suchen" id="search" aria-describedby="button-addon1" class="form-control border-0 bg-light sform" value="{{ request()->input('search') }}">
                            <div class="input-group-append">
                            <button id="srch_button" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                        </div>
                    </form>
                    <span id="chksrch"></span>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="col-lg-12 mt-2">
                    @if(!empty($items->id))
                    <form action="{{ route('item.update',$items->id) }}" method="POST">
                    @else
                    <form action="#" method=""></form>
                    @endif
                        @csrf
                        @method('PATCH')
                        <!-- First row -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" placeholder="Gerätename" value="{{$items->gname ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätename">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" placeholder="Inventarnummer" value="{{$items->invnr ?? '' }}"readonly
                                data-toggle="tooltip" data-placement="top" title="Inventarnummer">
                            </div>

                            <div class="form-group col-md-3">
                                    <input type="date" class="form-control" placeholder="Anschaffungsdatum" value="{{$items->andat ?? '' }}" readonly
                                    data-toggle="tooltip" data-placement="top" title="Anschaffungsdatum">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" placeholder="Kaufpreis" value="{{$items->kp ?? '' }}" readonly
                                data-toggle="tooltip" data-placement="top" title="Kaufpreis">
                            </div>
                        </div>
                        <!-- End of First row-->
                        <!-- Second row-->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                    <input type="text" class="form-control" placeholder="Standort" value="{{$items->location->address ?? ''}}" readonly data-toggle="tooltip" data-placement="top" title="Standort">
                            </div>
                            <div class="form-group col-md-4">
                                @if (!empty($room->invroom->rname))
                                <input type="text" class="form-control" placeholder="Raum" value="{{$room->invroom->rname}}" readonly data-toggle="tooltip" data-placement="top" title="Raum">
                                @else
                                <input type="text" class="form-control" placeholder="Raum" value="{{$room->invroom->altrname ?? ''}}" readonly data-toggle="tooltip" data-placement="top" title="Raum">
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <div class="ml-5">
                                    @isset($items->path_to_rg)
                                    <a href="{{'inventar/rechnungen/'.$items->path_to_rg ?? ''}}" target="_blank" >
                                        <i class="fas fa-file-pdf fa-4x" style="color:green" data-toggle="tooltip" data-placement="top" title="Rechnung ansehen"></i>
                                    </a>
                                    @else
                                    <i class="far fa-file-pdf fa-4x" style="color:#d9534f" data-toggle="tooltip" data-placement="top" title="Keine Rechnung"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <button type="button" class="btn btn-secondary">Ausmustern</button>
                            </div>
                        </div>
                        <!-- End of Second row-->
                        <!-- Third row-->
                        <div class="form-row mb-4">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" placeholder="Geräteart" value="{{$items->gart ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Geräteart">
                            </div>
                            <div class="form-group col-md-4">
                                    <input type="text" class="form-control" placeholder="Gerätetyp" value="{{$items->gtyp ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätetyp">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="serial_nummber" placeholder="Seriennummer" value="{{$items->sn ?? '' }}" readonly
                                data-toggle="tooltip" data-placement="top" title="Seriennummer">
                            </div>
                        </div>
                        <!-- End of Third row-->
                        <!-- Forth row -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="notes" rows="3" placeholder="Notizen" data-toggle="tooltip" data-placement="top" title="Notizen"> {{$items->notes ?? '' }} </textarea>
                            </div>
                        </div>
                        <!-- End of Forth row -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">verwerfen</button>
                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 mt-5">
                </div>
                </div>
    </section>
    <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
