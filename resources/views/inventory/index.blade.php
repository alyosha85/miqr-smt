@extends('layouts.admin_layout.admin_layout')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
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
</section>


<!-- TODO: Modals -->
<!-- Create Modal -->
@include('inventory.create')
@include('inventory.create_man')
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
    $('#location_id').append(new Option("Standort...",0));
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
    $("#rooms").append(new Option("N/A",1));
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

  $(document).ready(function(){
    $('#search').keyup(function(){
        let search = $("#search").val();
        $.ajax({
            type:'post',
            url:"{{ route('search_check') }}",
            data:{search:search},
            success:function(resp){
                if(resp=="false"){
                    $("#chksrch").html("<font color=red>Gerätename ist nicht vorhanden</font>");
                    $('#srch_button').attr("type","button");
                    $('form input').keydown(function (e) {
                        if (e.keyCode == 13) {
                            e.preventDefault();
                            return false;
                        }
                    });
                }else{
                    if(resp =="true") {
                    $("#chksrch").html("<font color=green>Gerätename ist korrekt</font>");
                    }
                }
            },error:function(){
                alert("Error");
            }
        });
    });
});


function printfunction() {
    $('#printpage').modal('hide');
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
$( document ).on( "click", ".add_man", function() {
    $('#location_id_man').find('option').remove();
    $('#location_id_man').append(new Option("Standort...",0));
    $('#rooms_man').find('option').remove();
    $("#rooms_man").append(new Option("Raum...",0));
    $.ajax({
        type: "GET",
        url: "{{ route('item.create_man') }}", //Route NAME USE
        }).done(function( data ) {
            $.each(data, function(index, item) {
                $("#location_id_man").append(new Option(item.address,item.id));
                locationSelect.push(item);
            });
    });
});

$( document ).on( "change", "#location_id_man", function() {
    $('#rooms_man').find('option').remove();
    $("#rooms_man").append(new Option("Bitte Wählen...",0));
    $("#rooms_man").append(new Option("N/A",1));
    for(let i = 0; i<locationSelect.length ; i++){
        if(locationSelect[i].id == $( this ).val()){
            console.log(locationSelect[i])
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
          console.log('file.selected');
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


