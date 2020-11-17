@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <!-- <h1 class="m-0 text-dark">H1 Header</h1> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            Erfassung
          </button>
        </div><!-- /.col -->

        <!-- modal -->
        @include('admin.modals.add_modal')
        <!--End Add Modal-->


        <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
        <button type="button" class="btn btn-success print" data-toggle="modal" data-target="#print">Inventarnummer Drucken</button>
        </div>
        <!-- modal Print -->
         @include('admin.modals.print_modal')
        <!--End modal Print -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <!-- Main row -->
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
        <form action="{{ url('/search') }}" type="get">
            <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
              <div class="input-group">
                <input type="search" name="search" placeholder="Suchen" aria-describedby="button-addon1" class="form-control border-0 bg-light" value="{{ request()->input('search') }}">
                <div class="input-group-append">
                  <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <div class="col-lg-6 mt-5">
                <form>
                    <!-- First row -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="machine_name" placeholder="Gerätename" value="{{$items->gname ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätename">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inventNumber" placeholder="Inventarnummer" value="{{$items->invnr ?? '' }}"readonly
                            data-toggle="tooltip" data-placement="top" title="Inventarnummer">
                        </div>

                        <div class="form-group col-md-3">
                                <input type="date" class="form-control" id="date" placeholder="Anschaffungsdatum" value="{{$items->andat ?? '' }}" readonly
                                data-toggle="tooltip" data-placement="top" title="Anschaffungsdatum">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="price" placeholder="Kaufpreis" value="{{$items->kp ?? '' }}" readonly
                            data-toggle="tooltip" data-placement="top" title="Kaufpreis">
                        </div>
                    </div>
                    <!-- End of First row-->
                    <!-- Second row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <select id="Standort" class="form-control" readonly data-toggle="tooltip" data-placement="top" title="Standort">
                                <option selected>Standort</option>
                                <option>Trachenberg 93</option>
                                <option>Barbarossa 2</option>
                                <option>Park 28</option>
                                <option>Löscher 16</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="Raum" class="form-control" readonly data-toggle="tooltip" data-placement="top" title="Raum">
                                <option selected>Raum</option>
                                <option>1.01</option>
                                <option>1.02</option>
                                <option>1.03</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <div >
                                <img src="{{ url('images/admin_images/rechnung.png') }}" alt="rechnung.png" class="rounded">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-danger">Ausmustern</button>
                        </div>
                    </div>
                    <!-- End of Second row-->
                    <!-- Third row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <select id="gtype" class="form-control" data-toggle="tooltip" data-placement="top" title="Geräteart">
                                <option selected>Geräteart</option>
                                <option>Rechner</option>
                                <option>Laptop</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            	<input type="text" class="form-control" id="machine_type" placeholder="Gerätetyp" value="{{$items->gtyp ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätetyp">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="machine_name" placeholder="Gerätename" value="{{$items->gname ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätename">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="serial_nummber" placeholder="Seriennummer" value="{{$items->sn ?? '' }}" readonly
                            data-toggle="tooltip" data-placement="top" title="Seriennummer">
                        </div>
                    </div>
                    <!-- End of Third row-->
                    <!-- Forth row -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="notes" rows="3" placeholder="Notizen" data-toggle="tooltip" data-placement="top" title="Notizen"> {{$items->notes ?? '' }} </textarea>
                        </div>
                    </div>
                    <!-- End of Forth row -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">verwerfen</button>
                        <button type="button" class="btn btn-primary">Speichern</button>
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


@endsection
@section('script')
<script>
let locationData = new Array();
let text = '';
$( document ).on( "click", ".print", function() {
    $('#address').find('option').remove();
    $("#address").append(new Option("Bitte Wählen...",0));
    $.ajax({
        type: "GET",
        url: "{{ route('auto') }}", //Route NAME USED
        }).done(function( data ) {
            $.each(data, function(index, item) {
                $("#address").append(new Option(item.location.address,item.locid));  
                locationData.push(item);
            });
    });
});
$( document ).on( "change", "#address", function() {
    for(let i = 0; i<locationData.length ; i++){
        if(locationData[i].locid == $( this ).val()){
            texty = locationData[i].locid + '-' + locationData[i].last_inv_num + '-' + locationData[i].suffix;  
        }
    }
    $('.inventNumber').val(texty);
});
</script>
@endsection