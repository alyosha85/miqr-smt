@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Druckeranfrage'])
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
                  <!-- Submitter Section layout_ticket submitter.blade.php -->
                  @include('tickets.layout_ticket.submitter')
                  <!--end Submitter Section -->
                  <!-- second card -->
                  <div class="col-lg-8">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile form-group">
                        <div class="row">
                          <div class="col-md-12 d-flex justify-content-around">
                            <button type="button" class="btn btn-outline-primary" id="printer_in">Drucker hinzufügen</button>
                            <button type="button" class="btn btn-outline-primary" id="printer_out">Drucker entfernen</button>
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

  $('#printer_in').click(function(){
    underform.children().remove();
    $('#printer_in').removeClass().addClass('btn btn-primary');
    $('#printer_out').removeClass().addClass('btn btn-outline-primary');
    underform.append(
      `
      <input type="hidden" name="problem_type" value="Drucker hinzufügen">
        <div class="card-body box-profile form-group">       
          <div class="row col-md-12">
            <div class="form-group col-md-6">
              <label for="searchcomputer"> Welcher Rechner</label>
              <select class="custom-select form-control mb-2 searchcomputer" name="searchcomputer" required>
              <option class="form-control" value="-1"></option>
              @foreach($computers as $computer)
                <option class="form-control" value="{{$computer['id']}}">{{$computer['gname']}}</option>
              @endforeach
              </select>
              <br><br><br>
              <div class="card-flyer2 text-center">
                <div class="text-box2">
                  <div class="text-container2">
                    <img src="/images/admin_images/info_400_2.png" style="max-width:70px;  alt="" />
                      <p class="text-info">Klicken Sie<a href="#"> hier</a>, falls der Drucker nicht aufgelistet ist.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-md-6">
              <fieldset class="border rounded px-2 mb-2">
              <legend class="w-auto">Drucker <i class="fas fa-print"></i></legend>
              <label for="printer_place"> Druckerstandort </label>
              <select class="custom-select form-control mb-2" id="printer_place" name="printer_place" required>
              </select>
                <label for="printer_room"> Raum </label>
                <select class="custom-select form-control mb-2" id="printer_room" name="printer_room" required>
                </select>


                <label for="printer_room"> Drucker </label>
                <select class="custom-select form-control mb-2" id="printer_name" name="printer_name" required>
                </select>
              </fieldset>
            </div> 
              <div class="form-group col-md-6 col-lg-12">
                <label for="notizen"> Beschreibung</label>
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
      $('#printer_name').find('option').remove();
      $('#printer_place').find('option').remove();
      $('#printer_place').find('optgroup').remove();
      $('#printer_place').append(new Option("Standort...",''));
      $('#printer_room').find('option').remove();
      $("#printer_room").append(new Option("Raum...",''));
      $.ajax({
        type: "get",
        url: "{{route('item.listen')}}",
        }).done(function(data) {
          selectAddresslisten = new Array();
          $.each(data['places'], function(index, item) {
              $("body #printer_place").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
          });
          $.each(data['locations'], function(index, item) {
          $("#printer_place #"+item.place_id).append(new Option(item.address,item.id));
          selectAddresslisten.push(item);
          });
        });
      $( document ).on( "change", "#printer_place", function() {
        $('#printer_name').find('option').remove();
        $('#printer_room').find('option').remove();
        $("#printer_room").append(new Option("Raum...",''));
        for(let i = 0; i<selectAddresslisten.length ; i++){
          if(selectAddresslisten[i].id == $( this ).val()){
            $.each(selectAddresslisten[i].invrooms, function(index, item) {
              $("#printer_room").append(new Option(item.rname+' ('+item.altrname+')',item.id));
              roomlisten.push(item);
              //console.log(item);
            });
          }
        }
      });

      $( document ).on( "change","#printer_room",function() {
      $.ajax({
        type:'post',
        url:"{{ route('printer_in_room') }}",
        data:{printers:$( this ).val(),location_id:$('#location_id_listen').val()},
        success:function(resp){
          $('#printer_name').find('option').remove();
              $.each(resp,function(index, item) {
              $("#printer_name").append(new Option(item.gname,item.invnr));
              });
        },error:function(){
          alert("Error");
        }
      });
    });
  
    $(".searchcomputer").select2({
    });

    $('.searchsoftware').select2({
      placeholder: 'sometext',
      allowClear: false,
      tags: true
    });
  })


  $('#printer_out').click(function(){
    $('#printer_in').removeClass().addClass('btn btn-outline-primary');
    $('#printer_out').removeClass().addClass('btn btn-primary');
    underform.children().remove();
    underform.append(
      `
      <input type="hidden" name="problem_type" value="printer_out">
        <div class="card-body box-profile form-group">       
          <div class="row col-md-12">
            <div class="form-group col-md-6">
              <label for="searchcomputer"> Welcher Rechner</label>
              <select class="custom-select form-control mb-2 searchcomputer" name="searchcomputer" required>
              <option class="form-control" value="-1"></option>
              @foreach($computers as $computer)
                <option class="form-control" value="{{$computer['id']}}">{{$computer['gname']}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <fieldset class="border rounded px-2 mb-2">
              <legend class="w-auto">Drucker <i class="fas fa-print"></i></legend>
              <label for="printer_place"> Druckerstandort </label>
              <select class="custom-select form-control mb-2" id="printer_place" name="printer_place" required>
              </select>
                <label for="printer_room"> Raum </label>
                <select class="custom-select form-control mb-2" id="printer_room" name="printer_room" required>
                </select>


                <label for="printer_room"> Drucker </label>
                <select class="custom-select form-control mb-2" id="printer_name" name="printer_name" required>
                </select>
              </fieldset>
            </div> 
              <div class="form-group col-md-6 col-lg-12">
                <label for="notizen"> Beschreibung</label>
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
      $('#printer_name').find('option').remove();
      $('#printer_place').find('option').remove();
      $('#printer_place').find('optgroup').remove();
      $('#printer_place').append(new Option("Standort...",''));
      $('#printer_room').find('option').remove();
      $("#printer_room").append(new Option("Raum...",''));
      $.ajax({
        type: "get",
        url: "{{route('item.listen')}}",
        }).done(function(data) {
          selectAddresslisten = new Array();
          $.each(data['places'], function(index, item) {
              $("body #printer_place").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
          });
          $.each(data['locations'], function(index, item) {
          $("#printer_place #"+item.place_id).append(new Option(item.address,item.id));
          selectAddresslisten.push(item);
          });
        });
      $( document ).on( "change", "#printer_place", function() {
        $('#printer_name').find('option').remove();
        $('#printer_room').find('option').remove();
        $("#printer_room").append(new Option("Raum...",''));
        for(let i = 0; i<selectAddresslisten.length ; i++){
          if(selectAddresslisten[i].id == $( this ).val()){
            $.each(selectAddresslisten[i].invrooms, function(index, item) {
              $("#printer_room").append(new Option(item.rname+' ('+item.altrname+')',item.id));
              roomlisten.push(item);
              //console.log(item);
            });
          }
        }
      });

      $( document ).on( "change","#printer_room",function() {
      $.ajax({
        type:'post',
        url:"{{ route('printer_in_room') }}",
        data:{printers:$( this ).val(),location_id:$('#location_id_listen').val()},
        success:function(resp){
          $('#printer_name').find('option').remove();
              $.each(resp,function(index, item) {
              $("#printer_name").append(new Option(item.gname,item.id));
              });
        },error:function(){
          alert("Error");
        }
      });
    });
 

    $(".searchcomputer").select2({
    });

    $('.searchsoftware').select2({
      placeholder: 'sometext',
      allowClear: false,
      tags: true
    });
  })


  })












</script>
@endsection





