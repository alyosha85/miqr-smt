@extends('layouts.admin_layout.admin_layout')

<style>
  
</style>

@section('content')



<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
      <div class="col-md-12">
        <table id="contacts" class="display responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Vorname</th>
                  <th>Anschrift</th>
                  <th>Postleitzahl</th>
                  <th>Ort</th>
                  <th>Tel. dienstlich</th>
                  <th>Tel. privat</th>
                  <th>Mobiltelefon</th>
                  <th>E-Mail privat</th>
                  <th>Abschluss</th>
                  <th>Tätigkeit im Unternehmen</th>
                  <th>BusinessUnit</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->vorname}}</td>
                  <td>{{$user->straße}}</td>
                  <td>{{$user->plz}}</td>
                  <td>{{$user->ort}}</td>
                  <td>{{$user->tel}}</td>
                  <td>{{$user->privat}}</td>
                  <td>{{$user->mobil}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->abschluss}}</td>
                  <td>{{$user->position}}</td>
                  <td>{{$user->office}}</td>
  
                  <td>
                    <button class="btn btn-success btn-sm">ba</button>
                    <button class="btn btn-warning btn-sm">bas</button>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      </div>
		</div>
	</div>
</section>


@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#contacts').DataTable();
  } );
</script>

@endsection