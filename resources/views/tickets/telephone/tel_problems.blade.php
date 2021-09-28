@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1>Telefon anfrage</h1>
            <!-- <div class="widget-user-image">
              <img class="img-circle elevation-2" src="/images/admin_images/software_300.png" alt="" />
          </div> -->
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  <section class="content">
    <div class="container-fluid col-lg-12">
      <div class="row">
        <div class="col-12 mx-auto">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile form-group">
              <form action="{{route ('form_store')}}" method="post" id="ticket_forms">
                @csrf
                <!-- child cards -->
                <div class="row mx-auto">
                  <!-- first card -->
                  <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile form-group">
                        <!-- Submitted by & Date -->
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="submitter"> Eingereicht von</label>
                            <input type="text" class="form-control" name="submitter" value="{{$user->username}}" readonly>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="submit_date"> Am</label>
                            <input type="text" class="form-control" name="submit_date" value="{{ $now }}" readonly>
                          </div>
                        </div>
                        <!-- Ticket Type -->
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label for="priority"> Priorität</label>
                            <select class="custom-select" name="priority" id="ticket_type">
                              <option selected class="dropdown-menu" value="2">Normal</option>
                              <option value="1">Niedrig</option>
                              <option value="2">Normal</option>
                              <option value="3">Hoch</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="tel_number"> Telefon</label>
                            <input type="text" class="form-control" name="tel_number" value="{{$user->tel}}" readonly>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="custom_tel_number"> Aktuelle Rufnummer <i class="fas fa-question" style="color: #661421;" data-toggle="tooltip" data-placement="top" title="Telefonnummer unter der Sie erreichbar sind" ></i> &nbsp;</label>
                            <input type="text" class="form-control" name="custom_tel_number" >
                          </div>
                        </div>
                        <div id="output"></div>
                      <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                  <!--end first card -->
                  <!-- second card -->
                  <div class="col-lg-8">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile form-group">
                        <div class="row">
                          <div class="col-md-12 d-flex justify-content-around">
                            <button type="button" class="btn btn-outline-primary" id="tel_change_address">Standort ändern</button>
                            <button type="button" class="btn btn-outline-primary" id="tel_change_name">Ändere den Namen
                            </button>
                            <button type="button" class="btn btn-outline-primary" id="tel_change_number">Ändere den Nummern
                            </button>
                          </div>
                        </div>
                      </div>
                      <div id="underform">
                        <!-- ! Jquery forms here --> 


                        <!-- ! Jquery forms ends here -->
                      </div>
                    </div>
                  </div>
                  <!--end second card -->
              </div>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->



@endsection

@section('script')
<script>
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function() {
  let underform = $('div#underform');
  let rm_children = underform.children().remove();
  rm_children;

  $('#tel_change_address').click(function(){
    underform.children().remove();
    $('#tel_change_address').removeClass().addClass('btn btn-primary');
    $('#tel_change_name').removeClass().addClass('btn btn-outline-primary');
    $('#tel_change_number').removeClass().addClass('btn btn-outline-primary');
    underform.append(
      `
      <input type="hidden" name="problem_type" value="tel_change_place">
      <div class="card-body box-profile form-group">       
        <div class="row col-md-12">
          <div class="form-group col-md-6">
            <fieldset class="border rounded px-2 mb-2">
            <legend class="w-auto">Aktueller Standort <i class="fas fa-phone-slash"></i></legend>
            <label for="tel_current_place"> Telefon standort </label>
            <select class="custom-select form-control mb-2" id="tel_current_place" name="tel_current_place" required>
            </select>
              <label for="tel_current_room"> Raum </label>
              <select class="custom-select form-control mb-2" id="tel_current_room" name="tel_current_room" required>
              </select>
              <label for="tel_name"> Telefon </label>
              <select class="custom-select form-control mb-2" id="tel_name" name="tel_name" required>
              </select>
            </fieldset>
          </div>
          <div class="form-group col-md-6">
            <fieldset class="border rounded px-2 mb-2">
            <legend class="w-auto">Neuer Standort <i class="fas fa-phone"></i></i></legend>
            <label for="tel_target_place"> Telefon Standort </label>
            <select class="custom-select form-control mb-2" id="tel_target_place" name="tel_target_place" required>
            </select>
              <label for="tel_target_room"> Raum </label>
              <select class="custom-select form-control mb-2" id="tel_target_room" name="tel_target_room" required>
              </select>
            </fieldset>
          </div> 
            <div class="form-group col-md-6 col-lg-12">
              <label for="notizen"> Notizen</label>
              <textarea type="text" name="notizen" class="form-control" ></textarea>
            </div>
          </div>                  
          <div>
            <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
          </div>
      </div>
      `
    );
    let selectAddresslisten = new Array();
    let roomlisten = new Array();
      $('#tel_name').find('option').remove();
      $('#tel_current_place').find('option').remove();
      $('#tel_current_place').find('optgroup').remove();
      $('#tel_current_place').append(new Option("Standort...",''));
      $('#tel_current_room').find('option').remove();
      $("#tel_current_room").append(new Option("Raum...",''));
      $.ajax({
        type: "get",
        url: "{{route('item.listen')}}",
        }).done(function(data) {
          selectAddresslisten = new Array();
          $.each(data['places'], function(index, item) {
              $("body #tel_current_place").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
          });
          $.each(data['locations'], function(index, item) {
          $("#tel_current_place #"+item.place_id).append(new Option(item.address,item.id));
          selectAddresslisten.push(item);
          });
        });
      $( document ).on( "change", "#tel_current_place", function() {
        $('#tel_name').find('option').remove();
        $('#tel_current_room').find('option').remove();
        $("#tel_current_room").append(new Option("Raum...",''));
        for(let i = 0; i<selectAddresslisten.length ; i++){
          if(selectAddresslisten[i].id == $( this ).val()){
            $.each(selectAddresslisten[i].invrooms, function(index, item) {
              $("#tel_current_room").append(new Option(item.rname+' ('+item.altrname+')',item.id));
              roomlisten.push(item);
            });
          }
        }
      });
      
      $( document ).on( "change","#tel_current_room",function() {
      $.ajax({
        type:'post',
        url:"{{ route('tel_in_room') }}",
        data:{telephones:$( this ).val(),location_id:$('#location_id_listen').val()},
        success:function(resp){
          console.log(resp)
          $('#tel_name').find('option').remove();
              $.each(resp,function(index, item) {
              $("#tel_name").append(new Option(item.gname,item.id));
              });
        },error:function(){
          alert("Error");
        }
      });
    });


    let selectAddresslist = new Array();
    let roomlist = new Array();
      $('#tel_target_place').find('option').remove();
      $('#tel_target_place').find('optgroup').remove();
      $('#tel_target_place').append(new Option("Standort...",''));
      $('#tel_target_room').find('option').remove();
      $("#tel_target_room").append(new Option("Raum...",''));
      $.ajax({
        type: "get",
        url: "{{route('item.listen')}}",
        }).done(function(data) {
          selectAddresslist = new Array();
          $.each(data['places'], function(index, item) {
              $("body #tel_target_place").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
          });
          $.each(data['locations'], function(index, item) {
          $("#tel_target_place #"+item.place_id).append(new Option(item.address,item.id));
          selectAddresslist.push(item);
          });
        });
      $( document ).on( "change", "#tel_target_place", function() {
        $('#tel_target_room').find('option').remove();
        $("#tel_target_room").append(new Option("Raum...",''));
        for(let i = 0; i<selectAddresslist.length ; i++){
          if(selectAddresslist[i].id == $( this ).val()){
            $.each(selectAddresslist[i].invrooms, function(index, item) {
              $("#tel_target_room").append(new Option(item.rname+' ('+item.altrname+')',item.id));
              roomlist.push(item);
            });
          }
        }
      });
  })

    




  $('#tel_change_name').click(function(){
    underform.children().remove();
    $('#tel_change_address').removeClass().addClass('btn btn-outline-primary');
    $('#tel_change_name').removeClass().addClass('btn btn-primary');
    $('#tel_change_number').removeClass().addClass('btn btn-outline-primary');
    underform.append(
      `
      <input type="hidden" name="problem_type" value="tel_change_name">
      <div class="card-body box-profile form-group">       
        <div class="row col-md-12">
          <div class="form-group col-md-6">
            <fieldset class="border rounded px-2 mb-2">
            <legend class="w-auto">Aktueller Standort <i class="fas fa-phone"></i></legend>
            <label for="tel_current_place"> Telefon standort </label>
            <select class="custom-select form-control mb-2" id="tel_current_place" name="tel_current_place" required>
            </select>
              <label for="tel_current_room"> Raum </label>
              <select class="custom-select form-control mb-2" id="tel_current_room" name="tel_current_room" required>
              </select>
              <label for="tel_name"> Telefon </label>
              <select class="custom-select form-control mb-2" id="tel_name" name="tel_name" required>
              </select>
            </fieldset>
          </div>
          <div class="form-group col-md-6">
            <fieldset class="border rounded px-2 mb-2">
            <legend class="w-auto">Neuer Standort <i class="fas fa-file-signature"></i></legend>
            <label for="tel_target_place"> Telefon Standort </label>
            <select class="custom-select form-control mb-2" id="tel_target_place" name="tel_target_place" required>
            </select>
              <label for="tel_target_room"> Raum </label>
              <select class="custom-select form-control mb-2" id="tel_target_room" name="tel_target_room" required>
              </select>
            </fieldset>
          </div> 
            <div class="form-group col-md-6 col-lg-12">
              <label for="notizen"> Notizen</label>
              <textarea type="text" name="notizen" class="form-control" ></textarea>
            </div>
          </div>                  
          <div>
            <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
          </div>
      </div>
      `
    );
    let selectAddresslisten = new Array();
    let roomlisten = new Array();
      $('#tel_name').find('option').remove();
      $('#tel_current_place').find('option').remove();
      $('#tel_current_place').find('optgroup').remove();
      $('#tel_current_place').append(new Option("Standort...",''));
      $('#tel_current_room').find('option').remove();
      $("#tel_current_room").append(new Option("Raum...",''));
      $.ajax({
        type: "get",
        url: "{{route('item.listen')}}",
        }).done(function(data) {
          selectAddresslisten = new Array();
          $.each(data['places'], function(index, item) {
              $("body #tel_current_place").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
          });
          $.each(data['locations'], function(index, item) {
          $("#tel_current_place #"+item.place_id).append(new Option(item.address,item.id));
          selectAddresslisten.push(item);
          });
        });
      $( document ).on( "change", "#tel_current_place", function() {
        $('#tel_name').find('option').remove();
        $('#tel_current_room').find('option').remove();
        $("#tel_current_room").append(new Option("Raum...",''));
        for(let i = 0; i<selectAddresslisten.length ; i++){
          if(selectAddresslisten[i].id == $( this ).val()){
            $.each(selectAddresslisten[i].invrooms, function(index, item) {
              $("#tel_current_room").append(new Option(item.rname+' ('+item.altrname+')',item.id));
              roomlisten.push(item);
            });
          }
        }
      });
      
      $( document ).on( "change","#tel_current_room",function() {
      $.ajax({
        type:'post',
        url:"{{ route('tel_in_room') }}",
        data:{telephones:$( this ).val(),location_id:$('#location_id_listen').val()},
        success:function(resp){
          console.log(resp)
          $('#tel_name').find('option').remove();
              $.each(resp,function(index, item) {
              $("#tel_name").append(new Option(item.gname,item.id));
              });
        },error:function(){
          alert("Error");
        }
      });
    });
  })

  $('#tel_change_number').click(function(){
    underform.children().remove();
    $('#tel_change_address').removeClass().addClass('btn btn-outline-primary');
    $('#tel_change_name').removeClass().addClass('btn btn-outline-primary');
    $('#tel_change_number').removeClass().addClass('btn btn-primary');
    underform.append(
      `
      
      `
    );

    $(".searchcomputer").select2({
      matcher: matchCustom,
    });
  })



$(".searchcomputer").select2({
  matcher: matchCustom,
});

$('.searchsoftware').select2({
  placeholder: 'sometext',
  allowClear: false,
  tags: true
});


});




</script>
@endsection




