@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-4">
        <!-- <h1 class="m-0 text-dark">H1 Header</h1> -->
        <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#add">
            Erfassung
          </button>
        </div><!-- /.col -->

        <div class="col-sm-4 mt-5"><!-- <h1 class="m-0 text-dark">H1 Header</h1> -->
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
        </div><!-- /.col -->
        <!-- modal -->
        @include('admin.modals.add_modal')
        <!--End Add Modal-->


        <div class="col-sm-4">
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
    <div class="container">
    <!-- Small boxes (Stat box) -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <div class="col-lg-12 mt-2">
                <form>
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
                            <button type="button" class="btn btn-danger">Ausmustern</button>
                        </div>
                    </div>
                    <!-- End of Second row-->
                    <!-- Third row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" placeholder="Geräteart" value="{{$items->gart ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Geräteart">
                        </div>
                        <div class="form-group col-md-3">
                            	<input type="text" class="form-control" placeholder="Gerätetyp" value="{{$items->gtyp ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätetyp">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" placeholder="Gerätename" value="{{$items->gname ?? '' }}" readonly data-toggle="tooltip" data-placement="top" title="Gerätename">
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
                            <textarea class="form-control" rows="3" placeholder="Notizen" data-toggle="tooltip" data-placement="top" title="Notizen"> {{$items->notes ?? '' }} </textarea>
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
    $('.inventNumber').val('');
    locationData = new Array();
    $.ajax({
        type: "GET",
        url: "{{ route('auto') }}", //Route NAME USED
        }).done(function( data ) {
            $.each(data, function(index, item) {
                $("#address").append(new Option(item.location.address,item.location_id));
                locationData.push(item);
            });
    });
});
$( document ).on( "change", "#address", function() {
    for(let i = 0; i<locationData.length ; i++){
        if(locationData[i].location_id == $( this ).val()){
            texty = locationData[i].location_id + '-' + (parseInt(locationData[i].last_inv_num) + 1) + '-' + locationData[i].suffix;
        }
    }
    $('.inventNumber').val(texty);
});

$( document ).on( "click", ".add", function() {
    $('#location_id').find('option').remove();
    $("#location_id").append(new Option("Standort...",0));
    $('#rooms').find('option').remove();
    $("#rooms").append(new Option("Raum...",0));
    $('.invnr').val('');
    locationData = new Array();
    $.ajax({
        type: "GET",
        url: "{{ route('item.create') }}", //Route NAME USE
        }).done(function( data ) {
            console.log(data);
            $.each(data, function(index, item) {
                $("#location_id").append(new Option(item.location.address,item.location_id));
                locationData.push(item);
            });
    });
});
$( document ).on( "change", "#location_id", function() {
    $('#rooms').find('option').remove();
    $("#rooms").append(new Option("Bitte Wählen...",0));
    for(let i = 0; i<locationData.length ; i++){
        if(locationData[i].location_id == $( this ).val()){
            texty = locationData[i].location_id + '-' + (parseInt(locationData[i].last_inv_num) + 1) + '-' + locationData[i].suffix;
            $.each(locationData[i].room, function(index, item) {
               let name = item.altrname;
               if(item.rname != '')
                    name = item.rname;
                $("#rooms").append(new Option(name,item.id));
            });
        }
    }
    $('.invnr').val(texty);
});

$(function() {
  $('.date').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: parseInt(moment().format('YYYY'))-1,
    maxYear: parseInt(moment().format('YYYY'))+1,
    locale: {
      format: 'YYYY-MM-DD'
    }
  });
});

// drop zone
Dropzone.options.dropzoneForm = {
    autoProcessQueue : false,
    acceptedFiles : ".pdf",
    maxFiles:1,
    init:function(){
      var submitButton = document.querySelector(".submit_form_ajax");
      myDropzone = this;

      submitButton.addEventListener('click', function(){
        myDropzone.processQueue();
      });

      this.on("addedfile", function(data){
          console.log('file.selected');
            $('.submit_form_ajax').css('visibility','visible');
            $('.submit_form').css('visibility','hidden');
      });
      this.on("complete", function(data){
        // if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        // {
        //   var _this = this;
        //   _this.removeAllFiles();
        // }
        $('.path_to_rg').val(data.xhr.response);
        // load_images();
        $('#item_form').submit();
      });
    }

  };
//   load_images();
  function load_images()
  {
    $.ajax({
      url:"{{ route('dropzone.fetch_pdf') }}",
      success:function(data)
      {
        $('#uploaded_pdf').html(data);
      }
    })
  }

  $(document).on('click', '.remove_pdf', function(){
    var name = $(this).attr('id');
    $.ajax({
      url:"{{ route('dropzone.delete_pdf') }}",
      data:{name : name},
      success:function(data){
        load_images();
      }
    })
  });

  Dropzone.prototype.defaultOptions.dictDefaultMessage = "Legen Sie die PDF-Datei hier ab, um sie hochzuladen";
  Dropzone.prototype.defaultOptions.dictFallbackMessage = "Ihr Browser unterstützt Drag&Drop Dateiuploads nicht";
  Dropzone.prototype.defaultOptions.dictFallbackText = "Benutzen Sie das Formular um Ihre Dateien hochzuladen";
  Dropzone.prototype.defaultOptions.dictInvalidFileType = "Eine Datei dieses Typs kann nicht hochgeladen werden";
  Dropzone.prototype.defaultOptions.dictCancelUpload = "Hochladen abbrechen";
  Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "null";
  Dropzone.prototype.defaultOptions.dictRemoveFile = "Datei entfernen";
  Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Sie können keine weiteren Dateien mehr hochladen.";

</script>
@endsection


