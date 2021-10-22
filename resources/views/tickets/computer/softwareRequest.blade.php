@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1 class="ticket_header">Softwareanfrage</h1>
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
                <!-- child cards -->
                <div class="row mx-auto">
                  <!-- first card -->
                  <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile form-group">
                        <!-- Submitted by & Date -->
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="submitter"> Erstellt von</label>
                            <input type="text" class="form-control" name="submitter" value="{{$user->username}}" readonly>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="submit_date">Erstellt Am</label>
                            <input type="text" class="form-control" name="submit_date" value="{{ $now }}" readonly>
                          </div>
                        </div>
                        <!-- Ticket Type -->
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label for="priority"> Priorität</label>
                            <select class="custom-select" name="priority" id="ticket_type">
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
                        <div class="row">
                          <div class="col-md-12 d-flex justify-content-around">
                            <button type="button" class="btn btn-outline-primary" id="softin">Software installieren</button>
                            <button type="button" class="btn btn-outline-primary" id="softactive">Funktioniert nicht | Aktivieren</button>
                            <button type="button" class="btn btn-outline-primary" id="softother">Sonstiges</button>
                          </div>
                        </div>
                      </div>
                      <div id="underform">
                        <!-- ! Jquery forms here --> 


                        <!-- ! Jquery forms ends here -->
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

function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
      return data;
    }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text ;

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
}

$(document).ready(function() {
  let underform = $('div#underform');
  let rm_children = underform.children().remove();
  rm_children;

  $('#softin').click(function(){
    underform.children().remove();
    $('#softin').removeClass().addClass('btn btn-primary');
    $('#softactive').removeClass().addClass('btn btn-outline-primary');
    $('#softother').removeClass().addClass('btn btn-outline-primary');
    underform.append(
      `
      <input type="hidden" name="problem_type" value="Software Installieren">
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
              <label for="searchsoftware"> Welche App </label>
            <select class="custom-select form-control mb-2 searchsoftware" name="searchsoftware" required>
            <option class="form-control" value="-1"></option>
              <option class="form-control" value="1">Teamviewer</option>
              <option class="form-control" value="2">FireFox</option>
              <option class="form-control" value="3">Chrome</option>
              <option class="form-control" value="4">another one</option>
            </select>
            <div>
              <p><small style="color:#661421;">App nicht in der Liste? schreiben 'rein' und drücken Sie die Eingabetaste</small></p>  
            </div>
            </div>
            <div class="form-group col-md-6 col-lg-12">
              <label for="software_name"> Link (falls verfügbar)</label>
              <input type="text" name="software_name" class="form-control" >
            </div>
            <div class="form-group col-md-6 col-lg-12">
              <label for="software_reason"> Warum Sie diese App brauchen</label>
              <input type="text" name="software_reason" class="form-control">
            </div>
            <div class="form-group col-md-6 col-lg-12">
              <label for="notizen"> Notizen</label>
              <textarea type="text" name="notizen" class="form-control" ></textarea>
            </div>
          </div>                  
          <div>
            <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
          </div>
        </div>
      `
    );

    $(".searchcomputer").select2({
      matcher: matchCustom,
    });

    $('.searchsoftware').select2({
      placeholder: 'sometext',
      allowClear: false,
      tags: true
    });
  })


  $('#softactive').click(function(){
    underform.children().remove();
    $('#softin').removeClass().addClass('btn btn-outline-primary');
    $('#softactive').removeClass().addClass('btn btn-primary');
    $('#softother').removeClass().addClass('btn btn-outline-primary');
    underform.append(
      `
      <input type="hidden" name="problem_type" value="Activiren">
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
              <label for="searchsoftware"> Welche App</label>
            <select class="custom-select form-control mb-2 searchsoftware" name="searchsoftware" required>
            <option class="form-control" value="-1"></option>
              <option class="form-control" value="1">Teamviewer</option>
              <option class="form-control" value="2">FireFox</option>
              <option class="form-control" value="3">Chrome</option>
              <option class="form-control" value="4">another one</option>
            </select>
            <div>
              <p><small style="color:#661421;">App nicht in der Liste? schreiben 'rein' und drücken Sie die Eingabetaste</small></p>  
            </div>
            </div>
            <div class="form-group col-md-6 col-lg-12">
              <label for="notizen"> Notizen</label>
              <textarea type="text" name="notizen" class="form-control" ></textarea>
            </div>
          </div>                  
          <div>
            <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
          </div>
        </div>
      `
    );
    $(".searchcomputer").select2({
      matcher: matchCustom,
    });

    $('.searchsoftware').select2({
      placeholder: 'sometext',
      allowClear: false,
      tags: true
    });
  })

  $('#softother').click(function(){
    underform.children().remove();
    $('#softin').removeClass().addClass('btn btn-outline-primary');
    $('#softactive').removeClass().addClass('btn btn-outline-primary');
    $('#softother').removeClass().addClass('btn btn-primary');
    underform.append(
      `
      <input type="hidden" name="problem_type" value="Softwareanfrage Sonstiges">
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
          <div class="form-group col-md-6 col-lg-12">
            <label for="notizen"> Bitte beschreiben Sie das Problem / Anfrage</label>
            <textarea type="text" name="notizen" class="form-control" ></textarea>
          </div>
        </div>                  
        <div>
          <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
        </div>
      </div>
      `
    );

    $(".searchcomputer").select2({
      matcher: matchCustom,
    });
  })



$(".searchcomputer").select2({
  matcher: matchCustom,
});

$('.searchsoftware').select2({
  placeholder: 'sometext',
  allowClear: false,
  tags: true
});


});




</script>
@endsection





