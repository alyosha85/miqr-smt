@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1>Probleme</h1>
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
                <input type="hidden" name="problem_type" value="problem">
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
                      <!-- child cards -->
                      <div class="row mx-auto">
                        <!-- first card -->
                        <div class="col-lg-4">
                          <fieldset class="border rounded px-2 mb-2">
                            <legend class="w-auto">Allgemein <i class="fas fa-desktop"></i></legend>
                              <ul class="list-unstyled">
                                <li>
                                  <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="geht_nicht_an" name="geht_nicht_an">
                                    <label class="custom-control-label" for="geht_nicht_an">Geht nicht an</label>
                                  </div>
                                </li>
                                <li>
                                <div class="custom-control custom-checkbox mb-2">
                                  <input type="checkbox" class="custom-control-input" id="blue" name="blue">
                                  <label class="custom-control-label" for="blue">Geht an / Blue Screen</label>
                                </div>

                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="black" name="black">
                                    <label class="custom-control-label" for="black">Geht an / Black Screen</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="slow_computer" name="slow_computer">
                                    <label class="custom-control-label" for="slow_computer">Sehr Langsam</label>
                                  </div>
                                </li>
                                <!-- <li>
                                  <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="no_sound" name="no_sound">
                                    <label class="custom-control-label" for="no_sound">keinen Ton</label>
                                  </div>
                                </li> -->
                              </ul>
                          </fieldset>
                        </div>
                        <!--end first card -->
                        <!-- second-->
                        <div class="col-lg-4">
                          <fieldset class="border rounded px-2 mb-2">
                            <legend class="w-auto"> Peripherie <i class="fas fa-mouse"></i></legend>
                            <ul class="list-unstyled">
                              <li>
                                <div class="custom-control custom-checkbox mb-2">
                                  <input type="checkbox" class="custom-control-input" id="web_cam_problem" name="web_cam_problem">
                                  <label class="custom-control-label" for="web_cam_problem">Webcam funktioniert nicht </label>
                                </div>
                              </li>
                              <li>
                                <div class="custom-control custom-checkbox mb-2">
                                  <input type="checkbox" class="custom-control-input" id="head_set_problem" name="head_set_problem">
                                  <label class="custom-control-label" for="head_set_problem">Headset funktioniert nicht</label>
                                </div>
                              </li>
                              <li>
                                <div class="custom-control custom-checkbox mb-2">
                                  <input type="checkbox" class="custom-control-input" id="lautsprecher_mal" name="lautsprecher_mal">
                                  <label class="custom-control-label" for="lautsprecher_mal">Lautsprecher funktioniert nicht</label>
                                </div>
                              </li>
                              <li>
                                <div class="custom-control custom-checkbox mb-2">
                                  <input type="checkbox" class="custom-control-input" id="keyboard_malfunction" name="keyboard_malfunction">
                                  <label class="custom-control-label" for="keyboard_malfunction">Tastatur funktioniert nicht</label>
                                </div>
                              </li>
                              <li>
                                <div class="custom-control custom-checkbox mb-2">
                                  <input type="checkbox" class="custom-control-input" id="mouse_mal" name="mouse_mal">
                                  <label class="custom-control-label" for="mouse_mal">Maus funktioniert nicht</label>
                                </div>
                              </li>
                            </ul>
                          </fieldset>
                        </div>
                        <!--end  -->
                        <!-- third  -->
                        <div class="col-lg-4">
                          <fieldset class="border rounded px-2 mb-2">
                          <legend class="w-auto"> Sonstiges <i class="fas fa-heartbeat"></i></legend>
                          <ul class="list-unstyled">

                            <li>
                              <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="slow_network" name="slow_network">
                                <label class="custom-control-label" for="slow_network">Netzwerkzugriff langsam</label>
                              </div>
                            </li>
                            <li>
                              <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="no_network_drive" name="no_network_drive">
                                <label class="custom-control-label" for="no_network_drive">Netzwerkzugriff keine Netzlaufwerke</label>
                              </div>
                            </li>
                            <li>
                              <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="laud_fan" name="laud_fan">
                                <label class="custom-control-label" for="laud_fan">lautes Lüftergeräusch</label>
                              </div>
                            </li>
                            <li>
                              <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="other" name="other">
                                <label class="custom-control-label" for="other">Sonstiges</label>
                              </div>
                            </li>
                          </ul>
                          </fieldset>
                        </div>
                        <!--end third -->
                      </div>
                    </div>
                        <!-- /.card-body -->
                        
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

                      <div class="form-group col-md-6">
                        <div id="reason">

                        </div>
                      </div>

                        <div class="form-group col-md-6 col-lg-12">
                          <label for="notizen"> Notizen </label>
                          <textarea type="text" name="notizen" class="form-control" ></textarea>
                        </div>
                      </div>                  
                      <div>
                        <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
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





