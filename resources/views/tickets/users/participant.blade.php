@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Neuer Teilnehmer / n'])
<section class="content">
  <div class="container-fluid col-lg-12">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile form-group">
            <form action="{{route ('store_participant')}}" method="post">
              @csrf
              <div class="row mx-auto">
                <!-- Submitter Section layout_ticket submitter.blade.php -->
                @include('tickets.layout_ticket.submitter')
                <!--end Submitter Section -->
                <!-- second card -->
                <div class="col-lg-8">
                  <div class="card card-primary card-outline">
                    <div id="underform">
                      <input type="hidden" name="problem_type" value="Neuer Teilnehmer">
                      <div class="card-body box-profile form-group">       
                        <div class="row col-md-12">
                          <table class="table table-sm" id="dynamicTable">  
                            <tr>
                                <th>Name</th>
                                <th>Vorname</th>
                                <th>Maßnahme</th>
                                <th>Bemerkung</th>
                                <th></th>
                            </tr>
                            <tr>  
                                <td><input type="text" name="addmore[0][name_participant]" class="form-control" /></td>  
                                <td><input type="text" name="addmore[0][vorname_participant]" class="form-control" /></td>  
                                <td><input type="text" name="addmore[0][course_participant]" class="form-control" /></td>  
                                <td><input type="text" name="addmore[0][notes_participant]" class="form-control" /></td>  
                                <td><button type="button" name="add" id="add" class="btn btn-success">Weitere</button></td>  
                            </tr>  
                          </table> 
                        </div>                  
                        <div>
                          <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
                        </div>
                      </div>
                    </div>
                    <input type="file">                          
                  </div>
                </div><!--end second card -->
              </div>
            </form>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('script')
<script>
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" class="form-control"/></td><td><input type="text" name="addmore['+i+'][vorname_participant]" class="form-control"/></td><td><input type="text" name="addmore['+i+'][course_participant]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][notes_participant]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Entfernen</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  



    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');
    const pond = FilePond.create(inputElement);
    FilePond.seOptions({
    });



</script>
@endsection





