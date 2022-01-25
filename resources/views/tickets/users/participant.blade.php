@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Neuer Teilnehmer / n'])
<section class="content">
  <div class="container-fluid col-lg-12">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile form-group">
            <form action="{{route ('store_participant')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row mx-auto">
                <!-- Submitter Section layout_ticket submitter.blade.php -->
                @include('tickets.layout_ticket.submitter')
                <!--end Submitter Section -->
                <!-- second card -->
                <div class="col-lg-8">
                  <div class="card card-primary card-outline">
                    <div id="underform">
                      <input type="hidden" name="problem_type" value="Neuer Teilnehmer">
                      <div class="card-body box-profile form-group">       
                        <div class="row col-md-12">
                          <a type="button" href="{{route('download_muster')}}" name="muster_download" id="muster_download" class="btn btn-success">Muster Herunterladen</a>
                          <br>
                          <div class="row col-md-12 mt-3">
                          <p>Bitte laden Sie das Muster herunter und tragen die Teilnehmer Daten in die entsprechende Zellen ein.</p>
                          </div>
                        </div>                  
                        <input type="file" name="muster"/>                         
                        <div>
                          <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!--end second card -->
              </div>
            </form>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
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





