@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1>Sonstiges</h1>
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
                        <!-- /.card-body -->  
                      <div class="card-body box-profile form-group">       
                      <div class="row col-md-12">
                        <div class="form-group col-md-6">
                          <label for="searchcomputer"> Betreff</label>
                          <input type="text" name="other" id="other" class="form-control" required autocomplete="false">
                        </div>
  
                        <div class="form-group col-md-6">
                          <div id="reason">
  
                          </div>
                        </div>
  
                          <div class="form-group col-md-6 col-lg-12">
                            <label for="prob_discription"> Problembeschreibung </label>
                            <textarea type="text" name="prob_discription" class="form-control" rows="15" value="{{ old('prob_discription') ? $request->prob_discription : '' }}" required autocomplete="false"></textarea>
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

@endsection





