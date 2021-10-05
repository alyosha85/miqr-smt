@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1>Druckeranfrage</h1>
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
                      <div id="underform">
                        <!-- ! Jquery forms here --> 
                        <input type="hidden" name="problem_type" value="printer_in">
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
                                <label for="notizen"> Notizen</label>
                                <textarea type="text" name="notizen" class="form-control" ></textarea>
                              </div>
                            </div>                  
                            <div>
                              <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
                            </div>
                        </div>


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


function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
      return data;
    }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text ;

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
}

$(document).ready(function() {
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
    matcher: matchCustom,
  });

})


</script>
@endsection





