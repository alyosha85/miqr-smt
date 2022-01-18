<div class="invoice col-md-12 p-3 mb-3">
  <div class="row text-center">
    <div class="col-12">
      <h4 class="ticket_header">{{$ticket->problem_type}}</h4>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-12 invoice-col">
      Berechtigungen wie bei
      <address>
        <u class="mt-1"><strong>{{@$ticket->replication->name}}, {{@$ticket->replication->vorname}} </strong></u><br>
      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      Name
      <address>
        <u class="mt-1"><strong>{{@$ticket->employee_lastname}}, {{@$ticket->employee_firstname}}</strong></u><br>
      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      Standort
      <address>
        <u class="mt-1"><strong>{{@$ticket->location->place->pnname}}, {{@$ticket->location->address}}</strong></u><br>
      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      Telefon
      <address>
        <u class="mt-1"><strong>{{@$ticket->telephone_employee}}</strong></u><br>
      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      Position
      <address>
        <u class="mt-1"><strong>{{@$ticket->position_employee}}</strong></u><br>
      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      Abteilung
      <address>
        <u class="mt-1"><strong>{{@$ticket->abteilung_employee}}</strong></u><br>
      </address>
    </div>
    @if($ticket->isplus)
    <div class="col-sm-12 invoice-col">
       <strong>IS+</strong> <i class="fas fa-check" style="color:green;"></i><br>
    </div>
    @endif
    @if($ticket->outlook)
    <div class="col-sm-12 invoice-col">
       <strong>Outlook</strong> <i class="fas fa-check" style="color:green;"></i><br>
    </div>
    @endif

   