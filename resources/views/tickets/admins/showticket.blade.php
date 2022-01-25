@extends('layouts.admin_layout.admin_layout')

<style>
/* chat profile photo */
.rounded-circle{
border-radius:50%;
width:50px;
height:50px;
}
/* ticket underline */
u {
  padding-bottom:3px !important;
  text-decoration:none !important;
  border-bottom:2px solid #661421 !important;
}

</style>

@section('content')
@include('tickets.layout_ticket.header',['title'=>''])

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
                        <form action="{{ route ('ticket.delete',$ticket->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success col-md-12" type="submit" value="Delete" >Erledigt</button>
                       </form>
                        </div>
                        @endif
                        <div class="form-group col-md-6">
                          <label for="submitter"> Ersteller</label>
                          <input type="text" class="form-control" name="submitter" value="{{@$ticket->subUser->username}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="ticket_created_at"> Am</label>
                          <input type="text" class="form-control" name="ticket_created_at" value="{{$createdAt->format('d M Y')}}" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="submitter_standort"> Standort</label>
                          <input type="text" class="form-control" name="submitter_standort" value="{{@$ticket->subUser->ort}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="submitter_adresse">Adresse</label>
                          <input type="text" class="form-control" name="submitter_adresse" value="{{@$ticket->subUser->straße}}" readonly>
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
                          <!-- PC & Laptop -->

                          @include($blade_name)
                       
                          <div class="col-md-12 invoice-col mt-2">
                            <strong style="color:#661421;" >Beschreibung <i class="far fa-comment-dots fa-lg"></i></strong>
                            <address class="mt-3">
                              <strong>{!!@$ticket->notizen!!}</strong><br>
                            </address>
                          </div>
                        </div>
                      </div>

                        <div class="col-md-12 d-flex justify-content-between">
                          <!-- Content  -->

                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-lg-12 ml-3">
                          <label for="beschreibung"> Kommentar </label>
                        </div>
                        <div class="col-md-12 ml-3">
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
  $(document).on('change', '#priority', function() {
    let priority = $(this).val();
   $.ajax({
    type:"post",
    url: "{{route('ticket.ticketPriority')}}",
    data: {"priority":priority,"ticket_id":ticket_id},
    success:function(result){
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
    }
   });
  });

  
})

$(document).on('blur', '.password', function() {
    let password_id = $(this).attr('id');
    let username =$(this).val();
    $.ajax({
    type:"post",
    url: "{{route('participant_username_update')}}",
    data: {"password_id":password_id,"username":username},
    success:function(result){
      console.log(result);
    }
   });



  });






</script>
@endsection





