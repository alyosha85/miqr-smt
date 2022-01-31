@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Neuer Mitarbeiter'])
<section class="content">
  <div class="container-fluid col-lg-12">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile form-group">
            <form action="{{route ('form_store')}}" method="post" id="ticket_forms">
              @csrf
              <div class="row mx-auto">
                <!-- Submitter Section layout_ticket submitter.blade.php -->
                @include('tickets.layout_ticket.submitter')
                <!--end Submitter Section -->
                <!-- second card -->
                <div class="col-lg-8">
                  <div class="card card-primary card-outline">
                    <div id="underform">
                      <input type="hidden" name="problem_type" value="Neuer Mitarbeiter">
                      <div class="card-body box-profile form-group">       
                        <div class="row col-md-12">
                          <div class="form-group col-md-6">
                            <label for="replication"> Berechtigungen wie bei &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                            <select class="custom-select form-control mb-2 replication" name="replication_id" required>
                            <option class="form-control" value=""></option>
                            @foreach($users as $user)
                              <option class="form-control" value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                            </select>
                            <div class="row mt-4">
                              <div class="form-group col-md-6">
                                <label for="submitter">Nachname &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                                <input type="text" class="form-control" name="employee_lastname" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="submit_date">Vorname &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                                <input type="text" class="form-control" name="employee_firstname" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <fieldset class="border rounded px-2 mb-2">
                            <legend class="w-auto"><i class="fas fa-clipboard-list" style="color:green;"></i></legend>
                            <label for="employee_place"> Standort &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                            <select class="custom-select form-control mb-2" id="employee_place" name="location_id" required>
                            </select>
                            <label for="position_employee"> Position &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                            <input type="text" class="form-control mb-2" id="position_employee" name="position_employee" required>
                            <label for="abteilung_employee"> Abteilung &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                            <input type="text" class="form-control mb-2" id="abteilung_employee" name="abteilung_employee" required>
                            <label for="telephone_employee"> Telefon &nbsp;<i class="fas fa-feather-alt fa-lg" style="color:#661421;"></i></label>
                            <input type="text" class="form-control mb-2" id="telephone_employee" name="telephone_employee" required>
                            <div class="col-md-12 d-flex justify-content-around">
                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="outlook" name="outlook">
                                <label class="custom-control-label" for="outlook">Outlook</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="isplus" name="isplus">
                                <label class="custom-control-label" for="isplus">IS+</label>
                              </div>
                            </div>
                            </fieldset>
                          </div> 
                          @include('tickets.layout_ticket.note',['discription'=>'Beschreibung'])
                          </div>                  
                          <div>
                            <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
                          </div>
                      </div>
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
@endsection

@section('script')
<script>
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function() {
    let selectAddresslisten = new Array();
    let roomlisten = new Array();
      $('#employee_place').find('option').remove();
      $('#employee_place').find('optgroup').remove();
      $('#employee_place').append(new Option("Standort...",''));
      $.ajax({
        type: "get",
        url: "{{route('item.listen')}}",
        }).done(function(data) {
          selectAddresslisten = new Array();
          $.each(data['places'], function(index, item) {
              $("#employee_place").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
          });
          $.each(data['locations'], function(index, item) {
          $("#employee_place #"+item.place_id).append(new Option(item.address,item.id));
          selectAddresslisten.push(item);
          });
        });

    $(".replication").select2({
      placeholder: 'Bitte Wählen',
      allowClear: false,
      tags: true
    });

  })
</script>
@endsection





