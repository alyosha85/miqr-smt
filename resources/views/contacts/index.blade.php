@extends('layouts.admin_layout.admin_layout')
<<<<<<< HEAD
<style>
  .img-size {
    width:128px !important;
    height: 128px !important;
  }


  .box.border.green {
    border: 1px solid #661421;
}
.box.border.green > .box-title {
    color: #FFFFFF !important;
    background-color: #661421;
    border-bottom: 1px solid #661421;
}
.box.border > .box-title, .box.solid > .box-title {
    padding: 8px 10px 2px;
    border-bottom: 1px solid #c4c4c4;
    min-height: 30px;
    background-color: #dbdbdb;
    border-radius: 4px 4px 0 0;
    margin-bottom: 0;
}
.box .box-title {
    margin-bottom: 15px;
    border-bottom: 1px solid #c4c4c4;
    min-height: 30px;
}
.box.border .box-body, .box.solid .box-body {
    border-radius: 0 0 4px 4px;
    padding: 10px;
    background-color: #FFFFFF;
}
.box.border, .box.solid {
    border: 1px solid #c4c4c4;
    border-radius: 4px;
}
.box {
    clear: both;
    margin-top: 0px;
    margin-bottom: 25px;
    padding: 0px;
}
* {
    outline: medium none !important;
}
*, *::before, *::after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
</style>

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

  <ul class="nav nav-pills nav-fill mb-3 text-uppercase font-weight-bold">
    <li class="nav-item dropdown">
      <select class="custom-select">
        <option selected>Please Choose a City</option>
        <option value="1">Erfurt</option>
        <option value="2">Berlin</option>
        <option value="3">Suhl</option>
      </select>
    </li>
    <li class="nav-item dropdown">
      <select class="custom-select">
        <option selected>Please Choose a City</option>
        <option value="1">Erfurt</option>
        <option value="2">Berlin</option>
        <option value="3">Suhl</option>
      </select>
    </li>
    @can('Bewegen')
    <li class="nav-item">
      <a class="nav-link" href="javascript:" id="move_modal">Bewegen <i class="fas fa-expand-arrows-alt" style="color: #5cb85c;"></i></a>
    </li>
    @endcan
    @can('Ausmustern')
    <li class="nav-item">
      <a class="nav-link" href="javascript:" id="invalid_modal" >Ausmustern <i class="far fa-times-circle"></i></a>
    </li>
    @endcan
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
    @endcan
  </ul>
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <!-- <div class="row d-flex align-items-stretch">
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

      </div> -->
      <div class="col-md-12">
        <!-- BOX -->
        <div class="box border green">
           <div class="box-title">
              <h4><i class="fa fa-book"></i> Address Book</h4>
           </div>
           <div class="box-body">
              <div class="row">
                 <div class="col-md-4">
                    <div id="address-book">
                       <div class="slider-content">
                          <ul>
                             <li id="a">
                                <a name="a" class="title">A</a>
                                <ul>
                                   <li><a href="/">Adam</a></li>
                                </ul>
                             </li>
                             <li id="b">
                                <a name="b" class="title">B</a>
                                <ul>
                                   <li><a href="/">Barry</a></li>
                                </ul>
                             </li>
                          </ul>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-8">
                    <div id="contact-card" class="panel panel-default">
                       <div class="panel-heading">
                          <h2 class="panel-title">John Doe</h2>
                       </div>
                       <div class="panel-body">
                          <div id="card" class="row">
                             <div class="col-md-4 headshot">
                                <img src="{{ url('images/admin_images/mitarbeiter/'.$user->username).'.jpg'}}" alt="" height="200" width="200">
                             </div>
                             <div class="col-md-8">
                                <table class="table table-hover">
                                   <tbody>
                                      <tr>
                                         <td><i class="fa fa-font"></i> Name</td>
                                         <td id="card-name">John Doe</td>
                                      </tr>
                                      <tr>
                                         <td><i class="fa fa-home"></i> Address</td>
                                         <td>795 Folsom Ave, Suite 600
                                            San Francisco, CA 94107
                                            P: (123) 456-7890 
                                         </td>
                                      </tr>
                                      <tr>
                                         <td><i class="fa fa-phone"></i> Phone</td>
                                         <td>+001 8753-3648-002</td>
                                      </tr>
                                      <tr>
                                         <td><i class="fa fa-envelope"></i> Email</td>
                                         <td>sampleemail@gmail.com</td>
                                      </tr>
                                   </tbody>
                                </table>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <!-- /BOX -->
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
=======

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
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839


@endsection

@section('script')
<script>
<<<<<<< HEAD
  jQuery(document).ready(function() {	
		handleSliderNav();	
		
		});
			var handleSliderNav = function () {
		$('#address-book').sliderNav();
		
		$('#address-book .slider-content ul li ul li a').click(function(e){
			e.preventDefault();
			var contact_card = $('#contact-card');
			//Get the name clicked on
			var name = $(this).text();
			//Set the name
			$('#contact-card .panel-title').html(name);
			$('#contact-card #card-name').html(name);
			//Randomize the image
			var img_id = Math.floor(Math.random() * (5 - 1 + 1)) + 1;
			//Set the image
			$('#contact-card .headshot img').attr('src', 'img/addressbook/'+img_id+'.jpg');
			contact_card.removeClass('animated fadeInUp').addClass('animated fadeInUp');
			var wait = window.setTimeout( function(){
				contact_card.removeClass('animated fadeInUp')},
				1300
			);
		});
	}

</script>
<script src="http://demo.hackandphp.com/address-book-with-bootstrap-and-jquery/js/slidernav/slidernav.js"></script>
=======


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

>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
@endsection