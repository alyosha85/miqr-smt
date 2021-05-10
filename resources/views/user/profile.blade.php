@extends('layouts.admin_layout.admin_layout')

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <i class="fas fa-user-circle fa-2x">&nbsp;</i>
                </div>

                <h3 class="profile-username text-center">{Nina} {Mcintire}</h3>

                <p class="text-muted text-center">{titel}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mail</b> <a class="float-right">{mail}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telefon</b> <a class="float-right">{0215463254}</a>
                  </li>
                  <li class="list-group-item">
                    <b>mobil</b> <a class="float-right">{0215463254}</a>
                  </li>
                  <li class="list-group-item">
                    <b>fax</b> <a class="float-right">{0215463254}</a>
                  </li>
                  <li class="list-group-item">
                    <b>fax</b> <a class="float-right">{0215463254}</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mehr Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Tätigkeit</strong>
                <p class="text-muted">{freie Mitarbeiter}</p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokation</strong>
                <p class="text-muted">{Landsberger Str. 23}, {Leipzig}, {04157}</p>
                <hr>
                <strong><i class="far fa-calendar-alt mr-1"></i> letzte Anmeldung</strong>
                <p class="text-muted">{01/02/2021}</p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




@endsection