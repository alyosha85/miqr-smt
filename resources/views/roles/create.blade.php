@extends('layouts.admin_layout.admin_layout')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 mx-auto">
        <div class="pull-left">
          <h2>Neue Rolle erstellen</h2>
        </div>
      <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
      </div>
      </div>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 mx-auto">
        <div class="form-group">
          <strong>Name:</strong>
          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 mx-auto">
        <div class="form-group">
          <strong>Permission:</strong>
          <br/>
          @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
            {{ $value->name }}</label>
            <br/>
          @endforeach
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>

  {!! Form::close() !!}
</section>
@endsection