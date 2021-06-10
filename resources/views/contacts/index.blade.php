@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
      <div class="col-md-12">
        <table id="contacts" class="display nowrap" style="width:100%">
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


  $(document).ready( function () {
  
  var table = $('#contacts').DataTable({
          initComplete: function () {
          count = 0;
          this.api().columns().every( function () {
              var title = this.header();
              //replace spaces with dashes
              title = $(title).html().replace(/[\W]/g, '-');
              var column = this;
              var select = $('<select id="' + title + '" class="select2" ></select>')
                  .appendTo( $(column.header()).empty() )
                  .on( 'change', function () {
                    //Get the "text" property from each selected data 
                    //regex escape the value and store in array
                    var data = $.map( $(this).select2('data'), function( value, key ) {
                      return value.text ? '^' + $.fn.dataTable.util.escapeRegex(value.text) + '$' : null;
                                });
                    
                    //if no data selected use ""
                    if (data.length === 0) {
                      data = [""];
                    }
                    
                    //join array into string with regex or (|)
                    var val = data.join('|');
                    
                    //search for the option(s) selected
                    column
                          .search( val ? val : '', true, false )
                          .draw();
                  } );

              column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' );
              } );
            
            //use column title as selector and placeholder
            $('#' + title).select2({
              multiple: true,
              closeOnSelect: false,
              placeholder: "Select a " + title
            });
            
            //initially clear select otherwise first option is selected
            $('.select2').val(null).trigger('change');
          } );
        }
  });
} );

</script>

@endsection