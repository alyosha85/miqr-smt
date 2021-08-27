@extends('layouts.admin_layout.admin_layout')

<style>
  @import url(//fonts.googleapis.com/css?family=Open+Sans:200, 300, 400, 700);
/* *** Demo CSS Styles *** */


/* *** The Checkboxes *** */
label.btn.toggle-checkbox > i.fa:before { content:"\f096"; }
    label.btn.toggle-checkbox.active > i.fa:before { content:"\f046"; }

label.btn.active { box-shadow: none; }
label.btn.primary.active {
    background-color: #337ab7;
    border-color: #2e6da4;
    color: #ffffff;
    box-shadow: none;
}
label.btn.info.active {
    background-color: #5bc0de;
    border-color: #46b8da;
    color: #ffffff;
    box-shadow: none;
}

</style>

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
                <!-- child cards -->
                <div class="row mx-auto">
                  <!-- first card -->
                  <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile form-group">
                        <!-- Submitted by & Date -->
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="submitter"> Eingereicht von</label>
                            <input type="text" class="form-control" name="submitter" value="{{$user->username}}" readonly>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="submit_date"> Am</label>
                            <input type="text" class="form-control" name="submit_date" value="{{ $now }}" readonly>
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
                            <input type="text" class="form-control" name="tel_number" value="{{$user->tel}}" readonly>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="custom_tel_number"> Aktuelle Rufnummer <i class="fas fa-question" style="color: #661421;" data-toggle="tooltip" data-placement="top" title="Telefonnummer unter der Sie erreichbar sind" ></i> &nbsp;</label>
                            <input type="text" class="form-control" name="custom_tel_number" >
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
                          <div class="col-md-12 d-flex justify-content-between">

                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="keyboard" name="keyboard">
                              <label class="custom-control-label" for="keyboard">Tastatur</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="mouse" name="mouse">
                              <label class="custom-control-label" for="mouse">Maus</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="Monitor" name="Monitor">
                              <label class="custom-control-label" for="Monitor">Bildschirm</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="speaker" name="speaker">
                              <label class="custom-control-label" for="speaker">Lautsprecher</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="headset" name="headset">
                              <label class="custom-control-label" for="headset">Kopfhörer</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="webcam" name="webcam">
                              <label class="custom-control-label" for="webcam">Webcam</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="other" name="other">
                              <label class="custom-control-label" for="other">Sonstiges</label>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div id="underform">
                        <!-- ! Jquery forms here --> 
                        <div class="card-body box-profile form-group">       
                          <div class="row col-md-12">
                            <div class="form-group col-md-6">
                              <label for="searchcomputer"> Welcher Rechner</label>
                              <select class="custom-select form-control mb-2 searchcomputer" name="searchcomputer" required>
                              <option class="form-control" value="-1"></option>
                              @foreach($computers as $computer)
                                <option class="form-control" value="{{$computer['id']}}">{{$computer['gname']}}</option>
                              @endforeach
                              </select>
                            </div>

                              <div class="form-group col-md-6 col-lg-12">
                                <label for="notizen"> Notizen <span style="color: #661421;"><small>Falls <strong>Sonstiges</> ipsum sdlfasldkjflöasdjfasdf</small></span></label>
                                <textarea type="text" name="notizen" class="form-control" ></textarea>
                              </div>
                            </div>                  
                            <div>
                              <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
                            </div>
                          </div>


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





