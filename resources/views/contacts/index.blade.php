@extends('layouts.admin_layout.admin_layout')
<style>
  .img-size {
    width:150px !important;
    height: 150px !important;
  }


</style>

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <fieldset class="border rounded px-2 mb-2">
      <legend class="w-auto">Nach Standort Suchen</legend>
      <ul class="nav nav-pills nav-justified mb-3">
        <li class="nav-item dropdown col-md-4">
          <select class="custom-select" name="cities" id="cities">
            <option selected class="dropdown-menu">Please Choose a City</option>
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->pnname}}</option>
            @endforeach
          </select>
        </li>
        <li class="nav-item dropdown col-md-4">
          <select class="custom-select" name="address" id="address">
          </select>
        </li>
        <li class="nav-item dropdown col-md-4">
          <select class="custom-select" name="raum" id="raum">
          </select>
        </li>
      </ul>
    </fieldset>
    <fieldset class="border rounded px-2 mb-2">
      <legend class="w-auto">Suche nach Name</legend>
        <ul class="nav nav-pills nav-justified mb-3">
          <li class="nav-item col-md-4">
            <select class="custom-select js-example-basic-single">
              <option class="form-control" selected disabled value=-1></option>
              @foreach($users as $user)
              <option class="form-control" name="searchByName" value="{{$user['id']}}">{{$user['name']}}</option>
              @endforeach
            </select>
          </li>
        </ul>
    </fieldset>
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row d-flex align-items-stretch" id="UnderCard">
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
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
  let cat_id = e.target.value;
    $.ajax({
    url:"{{ route('address') }}",
    type:"POST",
      data: {
      place_id: cat_id
      },
      success:function (data) {
      $('#address').empty();
      $.each(data['address'],function(index,address){
        $('#address').append('<option value="'+address.id+'">'+address.address+'</option>');
        }) //end foreach
      } //end success
    }) //end ajax request
  }); // end Cities on change function

 $('#raum').append('<option value="">'+"raum..."+'</option>');
  $('#address').on('change',function(e) {
  let address = e.target.value;
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
      }) //end foreach
      } //end success
    }) //end ajax request
  }); // end address on change function


  function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

// In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.js-example-basic-single').select2({ 
      placeholder: {
        id: '-1', // the value of the option
        text: 'Bitte Wählen...'
      },
      allowClear: true
    });

    $('.js-example-basic-single').on('change', function() {
      $('div#UnderCard').children().remove();
      var name = $(".js-example-basic-single option:selected").text();
      $.ajax ({
      type:'POST',
      url:"{{route('searchByName')}}",
      data:{searchbyname:name},
      success:function(resp){
        $.each(resp,function(index,item){
          $('div#UnderCard').append(
        `<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light col-md-12">
            <div class="card-header text-muted border-bottom-0 bg-light">
              ${item.position}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-6">
                  <h2 class="lead"><b>${item.name},&nbsp${item.vorname}</b></h2>
                  <p class="text-muted text-sm"><b>Ort: </b> ${item.ort} ,${item.plz} </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-building"></i></span>${item.straße}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-phone"></i></span><b>Tel. #</b> &nbsp ${item.tel}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-phone-square"></i></span><b>Privat #</b> &nbsp ${item.privat}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-mobile-alt"></i></span><b>Mobil #</b> &nbsp ${item.Mobil}</li>
                  </ul>
                </div>
                <div class="col-6 text-center">
                  <img src='images/admin_images/mitarbeiter/${item.name}, ${item.vorname}.jpg' alt="" class="img-circle img-fluid img-size "
                  onerror="this.onerror=null;this.src='images/admin_images/mitarbeiter/nopic.jpg';">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="#" class="btn btn-sm bg-teal disabled">
                  <i class="fas fa-comments"></i>
                </a>
                <a href="#" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Profil anzeigen
                </a>
              </div>
            </div>
          </div>
        </div>`
          );
        })
      } 
    })
});
    })
});


</script>
@endsection