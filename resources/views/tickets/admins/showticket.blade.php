@extends('layouts.admin_layout.admin_layout')

<style>
  /* chat profile photo */
.rounded-circle{
border-radius:50%;
width:50px;
height:50px;
}
</style>

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header text-center">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <h1>Some meaningful info here !!!"</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid col-lg-12">
      <div class="row">
        <div class="col-12 mx-auto">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile form-group"><!-- child cards -->
              <div class="row mx-auto">
                <!-- first card -->
                <div class="col-lg-4">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile form-group">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <p class="text-center lead">Zugewiesen an </p>
                          <h3 class="text-center" style="color: #661421;"><b>{{$ticket->user['username']}}</b></h3>
                        </div>
                        @if(auth()->user()->hasRole('Super_Admin'))
                        <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-success col-md-12">Erledigt</button>
                        </div>
                        @endif
                        <div class="form-group col-md-6">
                          <label for="submitter"> Ersteller</label>
                          <input type="text" class="form-control" name="submitter" value="{{$ticket->submitter}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="ticket_created_at"> Am</label>
                          <input type="text" class="form-control" name="ticket_created_at" value="{{$createdAt->format('d M Y')}}" readonly>
                        </div>
                      </div>
                      <!-- Ticket Type -->
                      <div class="row">
                        <input type="hidden" id="ticket_id_priority" value="{{$ticket->id}}">
                        <div class="form-group col-md-12">
                          <label for="priority"> Priorität</label>
                          <select class="custom-select" name="priority" id="priority">
                            @foreach($ticket_priority as $priority)
                            <option value="{{$priority->id}}"{{$priority->id == $ticket->priority_id ? 'selected' : ''}}>{{$priority->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        @if(auth()->user()->hasRole('Super_Admin'))
                        <div class="form-group col-md-12">
                          <label for="ticket_status"> Status</label>
                          <select class="custom-select" name="ticket_status" id="ticket_status">
                            @foreach($ticket_status as $status)
                            <option value="{{$status->id}}"{{$status->id == $ticket->ticket_status_id ? 'selected' : ''}}>{{$status->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        @endif
                        <div class="form-group col-md-12">
                          <label for="tel_number"> Telefon</label>
                          <input type="text" class="form-control" name="tel_number" value="{{$ticket->tel_number}}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="custom_tel_number"> Aktuelle Rufnummer</label>
                          <input type="text" class="form-control" name="custom_tel_number" value="{{@$ticket->custom_tel_number}}" readonly>
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
                        <div class="form-group col-md-6 col-lg-12">
                          <label for="beschreibung"> Beschreibung </label>
                          <textarea type="text" name="beschreibung" class="form-control" rows="4" style="resize:none;" readonly>{{@$ticket->notizen}}</textarea>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">

                          <!-- Content  -->

                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-lg-12">
                          <label for="beschreibung"> Kemmentar </label>
                        </div>
                        <div class="col-md-12 ">

                          @comments(['model' => $ticket])

                        </div>
                      </div><!--end for second row of second card-->
                    </div><!-- /.card-body box-profile second card -->
                  </div>
                </div><!--end second card cards -->
              </div><!--end child cards -->
            </div><!-- /.card-body box-profile -->
          </div><!-- /.card-body Main -->
        </div> <!-- /.card -->
      </div><!-- /.row -->
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

$(document).ready(function(){
  let ticket_id = $('#ticket_id_priority').val();
  console.log(ticket_id);
  $(document).on('change', '#priority', function() {
    let priority = $(this).val();
    console.log(priority);
   $.ajax({
    type:"post",
    url: "{{route('ticket.ticketPriority')}}",
    data: {"priority":priority,"ticket_id":ticket_id},
    success:function(result){
      console.log(result);
    }
   });
  });

  $(document).on('change', '#ticket_status', function() {
    let status = $(this).val();
    console.log(status);
   $.ajax({
    type:"post",
    url: "{{route('ticket.ticketStatus')}}",
    data: {"status":status,"ticket_id":ticket_id},
    success:function(result){
      console.log(result);
    }
   });
  });
})
</script>
@endsection





