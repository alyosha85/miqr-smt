@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Passwort ändern / Inaktiv'])
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
                      <input type="hidden" name="problem_type" value="Kennwort zurücksetzen">
                      <div class="card-body box-profile form-group">       
                        <div class="row col-md-12">
                          <div class="form-group col-md-6">
                            <div class="row">
                              <div class="form-group col-md-12">
                                <label for="submitter">Vollständiger Name</label>
                                <input type="text" class="form-control" name="password_name" required>
                              </div>
                                <div class="col-md-12 d-flex justify-content-around">
                                  <div class="custom-control custom-checkbox mb-6">
                                    <input type="checkbox" class="custom-control-input" id="inaktiv" name="inaktiv">
                                    <label class="custom-control-label" for="inaktiv">Inaktives Konto</label>
                                  </div>
                                  <div class="custom-control custom-checkbox mb-6">
                                    <input type="checkbox" class="custom-control-input" id="forgotten" name="forgotten">
                                    <label class="custom-control-label" for="forgotten">Passwort vergessen</label>
                                  </div>
                                </div>
                            </div>
                            
                          </div>
                          <div class="form-group col-md-6">
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


</script>
@endsection





