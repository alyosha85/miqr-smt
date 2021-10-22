@extends('layouts.admin_layout.admin_layout')
<style>
  


.dropdown-menu li:hover {
	 cursor: pointer;
	 cursor: hand;
}
 .title-element-name {
	 color: #ff8200;
}
 
.tooltip {
  pointer-events: none;
}
</style>
@section('content')
  <!-- Main content -->
  <section class="content-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ordner</h3>

          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active">
                <a href="#" class="nav-link">
                  <i class="fas fa-inbox"></i> aktuelle 
                  <span class="badge bg-primary float-right">{{$myTicketsCount}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-trash-alt"></i> Erledigte
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Anzahl offener Tickets: {{$myTicketsCount}} </h3>

            <!-- <div class="card-tools">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Search Mail">
                <div class="input-group-append">
                  <div class="btn btn-primary">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive mailbox-messages table-sm">
              <table class="table table-hover table-striped" id="example">
                <thead>
                  <tr>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center">Wer</th>
                      <!-- <th class="text-center">Office</th>
                      <th class="text-center">Custom</th> -->
                      <th class="text-center">Anfrage</th>
                      <th class="text-center">Beschreibung</th>
                      <th class="text-center">Rechner</th>
                      <th class="text-center"></th>
                      <th class="text-center">Priority</th>
                      <th class="text-center">Seit</th>
                  </tr>
              </thead>
                <tbody>
                  @forelse($myTickets as $myTicket)
                <tr>
                  <td class="text-left">
                    <a href="#" class="btn btn-outline-success"><i class="far fa-check-square fa-lg"></i></a>
                  </td>
                  <td class="text-center col-md-1">
                    <select name="assignedTo" id="assignedTo" class="form-control">
                      <option value="{{$myTicket->id}}" id="ticket_id_assignedTo">Zuweisen</option>
                        @foreach($admins as $admin)
                          <option value="{{ $admin->id }}"{{$admin->id == $myTicket->assignedTo ? 'selected' : '' }}>{{ $admin->username }}</option>
                        @endforeach
                    </select>
                  </td>

                  <td class="text-center"><a href="{{url ('ticket/'.$myTicket->id)}}">{{$myTicket->submitter}}</a></td>
                  <!-- <td class="text-center"><a>{{$myTicket->tel_number}}</a></td>
                  <td class="text-center"><a>{{$myTicket->custom_tel_number}}</a></td> -->
                  <td class="text-center"><a>{{$myTicket->problem_type}}</a></td>
                  <td class="text-center"><a>{{$myTicket->notizen}}</a></td>
                  <td class="text-center"><b>{{@$myTicket->gname_id}} </b></td>
                  <td class="text-center"></td>
                  <td class="text-center">{{@$myTicket->priority}} </td>
                  <td class="text-center">{{$myTicket->updated_at->diffForHumans()}}</td>
                </tr>
                @empty
                  <td class="text-center">
                    <img src="/images/admin_images/no_ticket.png" alt="why not">
                  </td>
                @endforelse
                </tbody>
              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer p-0">
            <div class="mailbox-controls">
              <div class="float-right">
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button> -->
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.float-right -->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>


@endsection
@section('script')
<script>

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function(){
  $(document).on('change', '#assignedTo', function() {
  let id_ticket = $('#ticket_id_assignedTo').val();
  let id = $(this).val(); 
  console.log(id)
   $.ajax({
    type:"post",
    url: "{{route('ticket.assignedTo')}}",
    data: {"id":id,"id_ticket":id_ticket},
    success:function(result){
    }
   });
  });
})

</script>

@endsection

