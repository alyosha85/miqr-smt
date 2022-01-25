@extends('layouts.admin_layout.admin_layout')
<style>
/* prevent blinking tooltip */
.tooltip {
  pointer-events: none;
}
</style>
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ordner</h3>

          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active"><a href="{{route('ticket.usertickets')}}" class="nav-link"><i class="fas fa-inbox"></i> aktuelle 
                  <span class="badge bg-primary float-right">{{$myTicketsCount}}</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('ticket.userticketsdone')}}" class="nav-link"><i class="far fa-check-circle"></i> Erledigte <span class="badge bg-success float-right">{{$ticketsdone}}</span></a></a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
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
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <tbody>
                  @forelse($myTickets as $myTicket)
                <tr>
                  <td class="text-left">
                    <a href="#" class="btn btn-outline-success" data-toggle="tooltip" data-placement="right" title="Als Erledigt markieren"><i class="fas fa-check fa-lg"></i></a>
                  </td>
                  <td class="mailbox-name"><a href="{{url ('ticket/'.$myTicket->id)}}">{{$myTicket->problem_type}}</a></td>
                  <td class="mailbox-subject"><b>{{@$myTicket->invitem->gname}} </b></td>
                  <td class="mailbox-subject"><b>{{@$myTicket->printer->gname}} </b></td>
                  <td class="mailbox-subject">{{@$myTicket->priority}}</td>
                  <td class="mailbox-attachment"></td>
                  <td class="mailbox-date text-right">{{$myTicket->updated_at->diffForHumans()}}</td>
                </tr>
                @empty
                  <td class="text-center">
                    <img src="/images/admin_images/no_ticket.png" alt="Kein Ticket">
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

</script>

@endsection

