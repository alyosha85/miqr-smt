@extends('layouts.admin_layout.admin_layout')

<style>
table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
    left: 10px !important;
    text-indent: 0 !important;
    background-color: #661421 !important;
}
/* prevent blinking tooltip */
.tooltip {
  pointer-events: none;
}
/* datatable - hidden column wrapping */
.dtr-data {
    white-space:normal
}
</style>

@section('content')
  <!-- Main content -->
  <section class="content-fluid">
    <div class="row">
      <div class="col-md-11 mx-auto">
        <nav class="navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            @if(auth()->user()->hasRole('Super_Admin'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.opentickets')}}" role="button" data-toggle="tooltip" title="Offen"><i class="far fa-folder-open fa-2x" style="color: #661421"></i>
                <span class="badge badge-success">{{@$AllTicketsCount}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.unassigned')}}" role="button" data-toggle="tooltip" title="Nicht zugewiesen"><i class="fas fa-exclamation-triangle fa-2x" style="color:#661421"></i>
                <span class="badge badge-danger">{{@$UnassignedTicketsCount}}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ticket.usertickets')}}" role="button" data-toggle="tooltip" title="Eigene Tickets"><i class="fas fa-clipboard-list fa-2x" style="color:#661421"></i>
                <span class="badge badge-success">{{@$myTicketsCount}}</span>
              </a>
            </li>
            @endif
          </ul>
      
          <!-- </ul> -->
          <ul class="navbar-nav ml-auto">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell fa-lg"></i>
               
              </a>
            </li>
          </ul>  
        </nav>

      </div>
      <!-- /.col -->
      <div class="col-md-11 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title text-bold">
              @if (URL::current() == route('ticket.opentickets'))   
              Anzahl offener Tickets:{{@$AllTicketsCount}}</h3>
              @else 
                Anzahl Nicht zugewiesener Tickets: {{@$UnassignedTicketsCount}}</h3>
              @endif
            

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
            <div class="mailbox-messages display nowrap" style="width: 100%;">
              <table class="display nowrap table-sm" id="ticket_table">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center"></th>
                    <th>Erstellt von</th>
                    <th>Anfrage</th>
                    <th>Rechner</th>
                    <th></th>
                    <th>Priorität</th>
                    <th>Erstellt am</th>
                    <th>Beschreibung</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($myTickets as $myTicket)
                <tr>
                  <td class="text-center">
                    @if($myTicket->ticket_status_id == 1)
                    <i class="fas fa-circle fa-1x" data-toggle="tooltip" title="Nicht begonnen" style="color:#001B2E"></i>
                    @elseif($myTicket->ticket_status_id == 2)
                    <i class="fas fa-wrench fa-1x" data-toggle="tooltip" title="In Bearbeitung" style="color:#3490DC"></i>
                    @elseif($myTicket->ticket_status_id == 3)
                    <i class="far fa-check-circle fa-1x" data-toggle="tooltip" title="Erledigt" style="color:#285D17"></i>
                    @elseif($myTicket->ticket_status_id == 4)
                    <i class="fas fa-user-friends fa-1x" data-toggle="tooltip" title="Wartet auf jemand anderen" style="color:#F9A620"></i>
                    @elseif($myTicket->ticket_status_id == 5)
                    <i class="fas fa-pause fa-1x" data-toggle="tooltip" title="Zurückgestellt" style="color:#e3342f"></i>
                    @else
                    <i class="far fa-copy fa-1x" data-toggle="tooltip" title="Duplikat" style="color:#285D17"></i>
                    @endif
                  </td>
                  <td class="col-md-1">
                    <select name="assignedTo" id="{{$myTicket->id}}" class="mailbox-star assignTo custom-select">
                      <option value="-1">Zuweisen</option>
                        @foreach($admins as $admin)
                          <option value="{{ $admin->id }}"{{$admin->id == $myTicket->assignedTo ? 'selected' : '' }}>{{ $admin->username }}</option>
                        @endforeach
                    </select>
                  </td>
                  <!-- <td class="text-left">
                    <span class="btn btn-success btn-small"><i class="fas fa-check"></i></span>
                  </td> -->

                  <td><a href="{{url ('ticket/'.$myTicket->id)}}">{{$myTicket->subUser->username}}</a></td>
                  <!-- <td><a>{{$myTicket->tel_number}}</a></td>
                  <td><a>{{$myTicket->custom_tel_number}}</a></td> -->
                  <td><a>{{$myTicket->problem_type}}</a></td>
                  
                  <td><b>{{@$myTicket->invitem->gname}} </b></td>
                  <td></td>
                  <td>
                    @if($myTicket->priority_id == 1)
                    <!-- <i class="fas fa-circle" data-toggle="tooltip" title="bla bla" style="color:#3490dc"></i> -->
                    <span class="badge badge-pill badge-primary">Niedrig</span>

                    @elseif ($myTicket->priority_id == 2)
                    <!-- <i class="fas fa-circle " data-toggle="tooltip" title="bla bla" style="color:#285D17"></i> -->
                    <span class="badge badge-pill badge-success">Normal</span>
                    @else
                    <!-- <i class="fas fa-circle" data-toggle="tooltip" title="bla bla" style="color:#e3342f"></i> -->
                    <span class="badge badge-pill badge-danger">Hoch</span>
                    @endif
                  </td>
                  <td>{{$myTicket->created_at->diffForHumans()}}
                    <p class="small muted">{{ $myTicket->created_at->format('d.m.Y ')}}</p>
                  </td>
                  <td class="wrapok" >{!!$myTicket->notizen!!}</td>
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

$(document).ready(function() {
    $('#ticket_table').DataTable({
      searching: false, 
      paging: false, 
      info: false,
      responsive: true,
      autoWidth: false,
      columnDefs: [
    { targets: 8, width: "40%" },
    ]
    });
} );

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function(){
  $(document).on('change', '.assignTo', function() {
    let ticket_id = $(this).attr('id')
    console.log(ticket_id);
    let assignedTo = $(this).val();
    console.log(assignedTo);
   $.ajax({
    type:"post",
    url: "{{route('ticket.assignedTo')}}",
    data: {"assignedTo":assignedTo,"ticket_id":ticket_id},
    success:function(result){
      console.log(result);
    }
   });
  });
})
</script>

</script>

@endsection
