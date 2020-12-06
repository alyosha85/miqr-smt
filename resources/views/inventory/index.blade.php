@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SubNav Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Inventar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#edit">Ändern <i class="fas fa-pen-fancy" style="color: #0275d8;"></i></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Erfassen <i class="fas fa-plus" style="color:#5bc0de;"></i></a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add">Erfassen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Javascript:" id="addMan">Manuell Erfassen</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#move">Bewegen <i class="fas fa-expand-arrows-alt" style="color: #5cb85c;"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#invalid">Ausmustern <i class="far fa-times-circle" style="#f7f7f7";></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Drucken <i class="fas fa-print" style="color:#007bff;"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Listen</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#printpage">Etiketten</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Inventur <i class="fas fa-dolly-flatbed" style="color: orange;"></i></a>
                </li>
              </ul>
            </div>
          </nav>


        <!-- Small boxes (Stat box) -->
        <div class="row mt-5">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>1000</h3>
                        <p>Total Rechner & Laptops</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mehr Info<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Hard Code</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mehr Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>00</h3>

                    <p>Hard Code</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Mehr Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Hard Code</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Mehr Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
    <div class="col-xs-6">
        <select class="form-control" name="select1" id="select1">
          <option value="1">Fruit</option>
          <option value="2">Animal</option>
          <option value="3">Bird</option>
          <option value="4">Car</option>
        </select>
      </div>
      <div class="col-xs-6">
        <select class="form-control" name="select2" id="select2">
          <option value="1">Banana</option>
          <option value="1">Apple</option>
          <option value="1">Orange</option>
          <option value="2">Wolf</option>
          <option value="2">Fox</option>
          <option value="2">Bear</option>
          <option value="3">Eagle</option>
          <option value="3">Hawk</option>
          <option value="4">BWM<option>
      </select>
      </div>
</section>

<!-- TODO: Modals -->
<!-- Create Modal -->
@include('inventory.create')
@include('inventory.create_man')
@include('inventory.edit')
@include('inventory.invalid')
<!-- Print modal -->
@include('inventory.label')



@endsection

@section('script')

<script>
let locationData = new Array();
let text = '';
$( document ).on( "click", ".print", function() {
    $('#anzahl').val(1);
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
    $('#gart_id').find('option').remove();
    $('#location_id').append(new Option("Standort...",0));
    $('#gart_id').append(new Option("Bitte Wählen...",0));
    $('#rooms').find('option').remove();
    $("#rooms").append(new Option("Raum...",0));
    $('.invnr').val('');
    locationData = new Array();
    $.ajax({
        type: "GET",
        url: "{{ route('item.create') }}", //Route NAME USE
        }).done(function( data ) {
            $.each(data['places'], function(index, item) {
                $("#location_id").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
            });
            $.each(data['invnr'], function(index, item) {
                $("#location_id #"+item.location.place_id).append(new Option(item.location.address,item.location_id));
                locationData.push(item);
            });
            $.each(data['garts'], function(index, item) {
                $("#gart_id").append(new Option(item.name,item.id));
                locationData.push(item);
            });
    });
});

$( document ).on( "change", "#location_id", function() {
    $('#rooms').find('option').remove();
    $("#rooms").append(new Option("Bitte Wählen...",''));
    $("#rooms").append(new Option("N/A",0));
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


    // Search function in Ausmustern
    $(document).ready(function(){
    $(document).on('keyup change', '#search_amg', function(){
        let search = $(this).val();
        $.ajax({
            type:'post',
            url:"{{ route('search_check') }}",
            data:{search:search},
            success:function(resp){
                if(resp=="false"){
                    $("body #chksrch").html("<font color=red>Gerätename ist nicht vorhanden</font>");
                }else{
                    if(resp =="true") {
                    $("body #chksrch").html("<font color=green>Gerätename ist korrekt</font>");
                        $.ajax({
                            type:'get',
                            url:"{{ route('search') }}",
                            data:{search:search},
                            success:function(resp){
                                $('body .amg_form .gname_amg').val(resp.items.gname)
                                $('body .amg_form .inventarnummer_amg').val(resp.items.invnr)
                                $('body .amg_form .andat_amg').val(resp.items.andat)
                                $('body .amg_form .kp_amg').val(resp.items.kp)
                                $('body .amg_form .standort_amg').val(resp.items.location.address)
                                $('body .amg_form .raum_amg').val(resp.room.invroom.rname)
                                $('body .amg_form .gart_amg').val(resp.items.garts.name)
                                $('body .amg_form .gtyp_amg').val(resp.items.gtyp)
                                $('body .amg_form .sn_amg').val(resp.items.sn)
                                $('body #grund').find('option').remove();
                                $('body #grund').append(new Option("Grund...",0));
                                $.each(resp.amgs, function(index, item){
                                    $("body #grund").append(new Option(item.name,item.id));
                                });
                            },error:function(){
                                alert("Error");
                            }
                        });
                    }
                }
            },error:function(){
                alert("Error");
            }
        });
    });
});


    // Search function Edit
    $(document).ready(function(){
    $(document).on('keyup change', '#search_edit', function(){
        let search_edit = $(this).val();
        $.ajax({
            type:'post',
            url:"{{ route('search_check_edit') }}",
            data:{search_edit:search_edit},
            success:function(resp){
                if(resp=="false"){
                    $("body #chksrchedit").html("<font color=red>Gerätename ist nicht vorhanden</font>");
                }else{
                    if(resp =="true") {
                    $("body #chksrchedit").html("<font color=green>Gerätename ist korrekt</font>");
                        $.ajax({
                            type:'get',
                            url:"{{ route('search_edit') }}",
                            data:{search_edit:search_edit},
                            success:function(resp){
                                $('body .item_edit_form .invnr_edit').val(resp.items.invnr)
                                $('body .item_edit_form .andat_edit').val(resp.items.andat)
                                $('body .item_edit_form .kp_edit').val(resp.items.kp)
                                $('body .item_edit_form .standort_edit').val(resp.items.location.address)
                                $('body .item_edit_form .raum_edit').val(resp.room.invroom.rname)
                                $('body .item_edit_form .gart_edit').val(resp.items.gart_id)
                                $('body .item_edit_form .gtyp_edit').val(resp.items.gtyp)
                                $('body .item_edit_form .sn_edit').val(resp.items.sn)
                            },error:function(){
                                alert("Error");
                            }
                        });
                    }
                }
            },error:function(){
                alert("Error");
            }
        });
    });
});


function printfunction() {
   // $('#printpage').modal('hide');
    let printinvnr = $('#prntinvnr').val();
    let anzahl = $('#anzahl').val();
    let WinPrint = window.open('/print/'+printinvnr+'/'+anzahl, '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    setInterval(function(){ WinPrint.close()}, 3000);

}

  Dropzone.prototype.defaultOptions.dictDefaultMessage = "Legen Sie die PDF-Datei hier ab, um sie hochzuladen";
  Dropzone.prototype.defaultOptions.dictFallbackMessage = "Ihr Browser unterstützt Drag&Drop Dateiuploads nicht";
  Dropzone.prototype.defaultOptions.dictFallbackText = "Benutzen Sie das Formular um Ihre Dateien hochzuladen";
  Dropzone.prototype.defaultOptions.dictInvalidFileType = "Eine Datei dieses Typs kann nicht hochgeladen werden";
  Dropzone.prototype.defaultOptions.dictCancelUpload = "Hochladen abbrechen";
  Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "null";
  Dropzone.prototype.defaultOptions.dictRemoveFile = "Datei entfernen";
  Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Sie können keine weiteren Dateien mehr hochladen.";



  //TODO: Manuell create
  let locationSelect = new Array();
    $(document).on( "click", "#addMan", function() {
    $('#add_man').modal('show');
    $('#location_id_man').find('option').remove();
    locationSelect = new Array();
    $('#gart_id_man').find('option').remove();
    $('#location_id_man').append(new Option("Standort...",0));
    $('#rooms_man').find('option').remove();
    $("#rooms_man").append(new Option("Raum...",''));#
    $.ajax({
        type: "GET",
        url: "{{ route('item.create_man') }}", //Route NAME USE
        }).done(function(data) {
            $.each(data['locations'], function(index, item){
                $("#location_id_man").append(new Option(item.address,item.id));
                locationSelect.push(item);
            });
            $.each(data['garts'], function(idex,item){
                $("#gart_id_man").append(new Option(item.name,item.id));
            })
        });
});



$( document ).on( "change", "#location_id_man", function() {
    $('#rooms_man').find('option').remove();
    $("#rooms_man").append(new Option("Bitte Wählen...",''));
    $("#rooms_man").append(new Option("N/A",0));
    for(let i = 0; i<locationSelect.length ; i++){
        console.log(locationSelect[i]);
        if(locationSelect[i].id == $( this ).val()){
            $.each(locationSelect[i].invrooms, function(index, item) {
                    let name = item.altrname;
                    if(item.rname != '')
                        name = item.rname;
                    $("#rooms_man").append(new Option(name,item.id));
                });
            }
        }
    });


$(function() {
  $('.date_man').daterangepicker({
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
            $('.submit_form_ajax').css('visibility','visible');
            $('.submit_form').css('visibility','hidden');
      });
      this.on("complete", function(data){

        $('.path_to_rg').val(data.xhr.response);
        // load_images();
        $('#item_form_man').submit();
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
        $('#uploaded_pdf_man').html(data);
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


</script>
@endsection



