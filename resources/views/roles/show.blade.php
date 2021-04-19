@extends('layouts.admin_layout.admin_layout')

@section('content')
<section class="content">
  <div class="container-fluuid">
    <div class="row">
      <div class="col-6 mx-auto">
        <div class="pull-left">
          <h2> {{ $role->name }}</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 mx-auto">
        <div class="form-group">
          <strong>Berechtigungen:</strong>
          @if(!empty($rolePermissions))
          @foreach($rolePermissions as $v)
          <h5><span class="badge badge-success">{{ $v->name }},</span></h5>
          @endforeach
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 mx-auto text-right">
        <a class="btn btn-danger" href="{{ route('roles.index') }}"> Zurück</a>
      </div>
    </div>

  </div>
</section>
@endsection