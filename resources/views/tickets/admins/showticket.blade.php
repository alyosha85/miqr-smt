@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1>Hardware-Anfrage</h1>
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
                <input type="hidden" name="problem_type" value="Hardware Anfrage">
                <!-- child cards -->
                <div class="row mx-auto">
                  <!-- first card -->
                  <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile form-group">
                        <!-- Submitted by & Date -->
                        <div class="row">
                          <div class="form-group col-md-12">
                            <p class="text-center lead">Zugewiesen an </p>
                            <h3 class="text-center" style="color: #661421;"><b>{{$ticket->user['username']}}</b></h3>
                          </div>
                          @if(auth()->user()->hasRole('Super_Admin'))
                          <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success col-md-12">Erledigt</button>
                          </div>
                          @endcan
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
                          <div class="form-group col-md-12">
                            <label for="priority"> Priorität</label>
                            <select class="custom-select" name="priority" id="priority">
                              <option selected class="dropdown-menu" value="2">Normal</option>
                              <option value="1">Niedrig</option>
                              <option value="2">Normal</option>
                              <option value="3">Hoch</option>
                            </select>
                          </div>
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
                            <textarea type="text" name="beschreibung" class="form-control" readonly>{{@$ticket->notizen}}</textarea>
                          </div>
                          <div class="col-md-12 d-flex justify-content-between">



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






</script>
@endsection





