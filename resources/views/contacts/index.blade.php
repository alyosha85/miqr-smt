@extends('layouts.admin_layout.admin_layout')
<style>
  .img-size {
    width:128px !important;
    height: 128px !important;
  }
</style>

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <ul class="nav nav-pills nav-justified mb-3">
    <li class="nav-item dropdown col-md-4">
      <select class="custom-select nav-link" name="cities" id="cities">
        <option selected class="dropdown-menu">Please Choose a City</option>
        @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->pnname}}</option>
        @endforeach
      </select>
    </li>
    <li class="nav-item dropdown col-md-4">
      <select class="custom-select nav-link" name="address" id="address">
      </select>
    </li>
    <li class="nav-item dropdown col-md-4">
      <select class="custom-select nav-link" name="address" id="address">
      </select>
    </li>
    <li class="nav-item dropdown col-md-4">
      <select class="custom-select nav-link" name="raum" id="raum">
      </select>
    </li>
    <!-- 
    @if(auth()->user()->can('Drucken_list') || auth()->user()->can('Drucken_ticket'))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Drucken <i class="fas fa-print" style="color:#007bff;"></i></a>
    @endif
      <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
    @can('Drucken_list')
      <a class="dropdown-item" href="javascript:" id="list_modal">Listen</a>
      <div class="dropdown-divider"></div>
    @endcan
    @can('Drucken_ticket')
        <a class="dropdown-item" href="javascript:" id="etiketten_modal">Etiketten</a>
      </div>
      @endcan
      </li>
    @can('Inventur')
      <li class="nav-item">
        <a class="nav-link" href="javascript:" id="inventur_modal">Inventur <i class="fas fa-dolly-flatbed" style="color: orange;"></i></a>
      </li>
    @endcan -->
  </ul>
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row d-flex align-items-stretch">
        @foreach($users as $user)
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0 bg-light">
              {{$user->position}}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>{{$user->name}}</b></h2>
                  <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>{{$user->straße}}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>Tel # {{$user->tel}}</li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                    <img src="{{ url('images/admin_images/mitarbeiter/'.$user->username).'.jpg'}}" alt="" class="img-circle img-fluid img-size " 
                    onerror="this.onerror=null;this.src='images/admin_images/mitarbeiter/nopic.jpg';">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="#" class="btn btn-sm bg-teal">
                  <i class="fas fa-comments"></i>
                </a>
                <a href="#" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Profil anzeigen
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item"><a class="page-link" href="#">8</a></li>
        </ul>
      </nav>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
  </div>
</section>
<!-- /.content -->


@endsection

@section('script')
<script>

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
 // $('#address').append(new Option("Raum...",''));
 $('#address').append('<option value="">'+"Adresse..."+'</option>');
  $('#cities').on('change',function(e) {
  $('#raum').find('option').remove();
  $('#raum').append('<option value="">'+"raum..."+'</option>');
  var cat_id = e.target.value;
    $.ajax({
    url:"{{ route('address') }}",
    type:"POST",
      data: {
      place_id: cat_id
      },
      success:function (data) {
        console.log(data);
      $('#address').empty();
      $.each(data['address'],function(index,address){
        $('#address').append('<option value="'+address.id+'">'+address.address+'</option>');
        })
      }
    })
  });

 $('#raum').append('<option value="">'+"raum..."+'</option>');
  $('#address').on('change',function(e) {
  var address = e.target.value;
    $.ajax({
    url:"{{ route('rooms') }}",
    type:"POST",
      data: {
      address_id: address
      },
      success:function (data) {
        console.log(data);
      $('#raum').empty();
      console.log(data);
      $.each(data['rooms'],function(index,item){
        $('#raum').append('<option value="'+item.id+'">'+item.rname+' '+item.altrname+'</option>');
        })
      }
    })
  });
});


</script>
@endsection