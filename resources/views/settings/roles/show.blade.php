@extends('layouts.admin_layout.admin_layout')
<link rel="stylesheet" href="{{ url ('bootstrap_modal/bootstrap-side-modals.css') }}">
@section('content')

<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
      <div class="col-6 mx-auto">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Rolle</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
          <tr>
            <th scope="row">{{$role->id}}</th>
            <td>{{$role->name}}</td>
            <td class="text-right">
              <a href="{{url ('/role/'.$role->id)}}" class="btn btn-outline-success"><i class="far fa-eye"></i></a>
              <button class="btn btn-outline-primary"><i class="fas fa-pen-alt"></i></button>
              <button class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div> <!-- col 3-->
		</div>
	</div>
</section>


@include('settings.modal_settings.roles.roles_view')
@endsection

@section('script')

@endsection