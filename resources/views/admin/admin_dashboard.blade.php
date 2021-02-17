@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
              <p class="text-muted text-center">{{Auth::user()->abteilung}}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <strong><i class="fas fa-user-md"></i> Position</strong><a class="float-right">{{Auth::user()->position}}</a>
                </li>
                <li class="list-group-item">
                  <strong><i class="fas fa-phone-alt"></i> Rufnummer</strong><a class="float-right">{{Auth::user()->tel}}</a>
                </li>
                <li class="list-group-item">
                  <strong><i class="far fa-envelope"></i> Mail</strong><a class="float-right">{{Auth::user()->email}}</a>
                </li>
              </ul>

              <div class="card-body">  
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Standort</strong>
                <p class="text-muted">{{Auth::user()->straße}} , {{Auth::user()->bundesland}} </p>
                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <h3>Card Header</h3>
            </div>
            <div class="card-body">
              <div class="tabs">
                <div class="tab-pane">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
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
