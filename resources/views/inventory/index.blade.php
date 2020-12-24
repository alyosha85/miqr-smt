@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- SubNav Bar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="Javascript:">Inventar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#" id="edit_modal">Ändern <i class="fas fa-pen-fancy" style="color: #0275d8;"></i></a>
				</li>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Erfassen <i class="fas fa-plus" style="color:#5bc0de;"></i></a>
				  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="javascript:" id="add_modal">Erfassen</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="Javascript:" id="add_modal_man">Manuell Erfassen</a>
				  </div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:" id="move_modal">Bewegen <i class="fas fa-expand-arrows-alt" style="color: #5cb85c;"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:" id="invalid_modal" >Ausmustern <i class="far fa-times-circle"></i></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Drucken <i class="fas fa-print" style="color:#007bff;"></i></a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="javascript:" id="list_modal">Listen</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="javascript:" id="etiketten_modal">Etiketten</a>
					</div>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="javascript:" id="inventur_modal">Inventur <i class="fas fa-dolly-flatbed" style="color: orange;"></i></a>
				</li>
			  </ul>
			</div>
		  </nav>

		<!-- Small boxes (Stat box) -->
		<div class="row mt-5">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>1000</h3>
						<p>Total Rechner & Laptops</p>
					</div>
					<div class="icon">
						<i class="fas fa-tv"></i>
					</div>
					<a href="#" class="small-box-footer">Mehr Info<i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
				<div class="inner">
					<h3>53<sup style="font-size: 20px">%</sup></h3>

					<p>Hard Code</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="#" class="small-box-footer">Mehr Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
				<div class="inner">
					<h3>00</h3>

					<p>Hard Code</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">Mehr Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
				<div class="inner">
					<h3>65</h3>

					<p>Hard Code</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="#" class="small-box-footer">Mehr Info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
	</div>
</section>

<!-- TODO: Modals -->
<!-- Create Modal -->
@include('inventory.create')
@include('inventory.create_man')
@include('inventory.edit')
@include('inventory.invalid')
@include('inventory.move')
@include('inventory.inventur')
@include('inventory.list')
<!-- Print modal -->
@include('inventory.label')



@endsection

@section('script')


<script>

//************************************************************* List Print **********************************************************
let selectAddresslisten = new Array();
let roomlisten = new Array();
$(document).on("click", "#list_modal", function() {
	$('#listen').modal('show');
	$('#location_id_listen').find('option').remove();
	$('#location_id_listen').find('optgroup').remove();
	$('#location_id_listen').append(new Option("Standort...",''));
	$('#rooms_id_listen').find('option').remove();
	$("#rooms_id_listen").append(new Option("Raum...",''));
	$.ajax({
		type: "get",
		url: "{{route('item.listen')}}",
		}).done(function(data) {
			selectAddresslisten = new Array();
			$.each(data['places'], function(index, item) {
					$("body #location_id_listen").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
			});
			$.each(data['locations'], function(index, item) {
			$("#location_id_listen #"+item.place_id).append(new Option(item.address,item.id));
			selectAddresslisten.push(item);
			});
		});
});

$( document ).on( "change", "#location_id_listen", function() {
	$('#room_id_listen').find('option').remove();
	$("#room_id_listen").append(new Option("Raum...",''));
	for(let i = 0; i<selectAddresslisten.length ; i++){
		if(selectAddresslisten[i].id == $( this ).val()){
			$.each(selectAddresslisten[i].invrooms, function(index, item) {
				$("body #room_id_listen").append(new Option(item.rname+' ('+item.altrname+')',item.id));
				roomlisten.push(item);
			});
		}
	}
});

$( document ).on( "change","#room_id_listen",function() {
	$.ajax({
		type:'post',
		url:"{{ route('items_in_room_listen') }}",
		data:{room_id:$( this ).val(),location_id:$('#location_id_listen').val()},
		success:function(resp){
			$('body #table_listen').show();
            $('body #table_listen tbody').empty();
            $('body #altrname_listen').append()
				$.each(resp, function(index, item) {
                    let gtyp = item.gtyp ? item.gtyp : '-';
                    $('body #table_listen tbody').append('<tr id="'+item.invnr+'"><td>'+(index+1)+'</td><td>'+item.invnr+'</td><td>'+item.gname+
                        '</td><td>'+item.garts.name+'</td><td>'+gtyp+'</td></tr>')
			    });
		},error:function(){
			alert("Error");
		}
	});
});

$(document).on("click","#print_list",function(){
		$("body .print_div").text("Raum:" +$("body #room_id_listen :selected").text()+' '+'Address: '+$("body #location_id_listen :selected").text());
    $('body #listen .modal-body').print();
});

$.fn.extend({
	print: function() {
		var frameName = 'printIframe';
		var doc = window.frames[frameName];
		if (!doc) {
			$('<iframe>').hide().attr('name', frameName).appendTo(document.body);
			doc = window.frames[frameName];
		}
		doc.document.body.innerHTML = this.html();
		doc.window.print();
		return this;
	}
});

//************************************************************* Inventur ************************************************************//
let selectAddressInventur = new Array();
let roomInventur = new Array();
$(document).on("click", "#inventur_modal", function() {
	$('#inventur').modal('show');
	$('#location_id_inventur').find('option').remove();
	$('#location_id_inventur').find('optgroup').remove();
	$('#room_id_inventur').find('option').remove();
	$('body #table_inventur').hide();
	$('#location_id_inventur').append(new Option("Standort...",''));
	$('#rooms_id_inventur').find('option').remove();
	$("#rooms_id_inventur").append(new Option("Raum...",''));
	selectAddressInventur = new Array();
	$.ajax({
		type: "get",
		url: "{{route('item.inventur')}}",
		}).done(function(data) {
		$.each(data['places'], function(index, item) {
			$("body #location_id_inventur").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
		});
		$.each(data['locations'], function(index, item) {
		$("#location_id_inventur #"+item.place_id).append(new Option(item.address,item.id));
		selectAddressInventur.push(item);
		});
	});
});

$( document ).on( "change", "#location_id_inventur", function() {
	$('#room_id_inventur').find('option').remove();
	$("#room_id_inventur").append(new Option("Raum...",''));
	for(let i = 0; i<selectAddressInventur.length ; i++){
		if(selectAddressInventur[i].id == $( this ).val()){
			$.each(selectAddressInventur[i].invrooms, function(index, item) {
				$("body #room_id_inventur").append(new Option(item.rname+' ('+item.altrname+')',item.id));
				roomInventur.push(item);
			});
		}
	}
});
let globalIndex = 0;
$( document ).on( "change","#room_id_inventur",function() {
	$( "body #inventur_check_input" ).focus();
	$.ajax({
		type:'post',
		url:"{{ route('roomInventur') }}",
		data:{room_id:$( this ).val(),location_id:$('#location_id_inventur').val()},
		success:function(resp){
			$('body #table_inventur').show();
			$('body #table_inventur tbody').empty();
			itemList = new Array();
				$.each(resp, function(index, item) {
                    console.log(resp);
					globalIndex = index;
                    $('body #table_inventur tbody').append('<tr id="'+item.invnr+'"><td>'+(index+1)+'</td><td>'+item.invnr+'</td><td>'+item.gname+'</td><td>'+
                        '<label class="toggle"><input class="toggle-checkbox" name="zuordnen'+item.invnr+'" value="yes" type="checkbox"><div class="toggle-switch"></div><span class="toggle-label"></span></label>'
                        +'</td></tr>')
					itemList.push({
												invnr:item.invnr,
												gname:item.gname,
												place:item.invroom.location.place.pnname,
												address:item.invroom.location.address,
												location_id:item.invroom.location.id,
												room_id:item.invroom.id,
												room:item.invroom.rname,
												zuordnen:0
					});
			});

		},error:function(){
			alert("Error");
		}
	});
});

let itemList = new Array();
$( document ).on( "change","body #inventur_check_input",function() {
	let found = false;
	$.each(itemList, function(index, item) {
		if(item.invnr == $('body #inventur_check_input').val())
		{
			item.zuordnen=null;
			$('body #table_inventur tbody #'+$('body #inventur_check_input').val()).hide();
			$('body #inventur_check_input').val('');
			$( "body #inventur_check_input" ).focus();
			found = true;
		}
	});
	if (found == false){
		$.ajax({
			type: "get",
			url: "{!! route('getinvnr') !!}/"+$('body #inventur_check_input').val(),
			}).done(function(item) {
					$('body #table_inventur tbody').append('<tr id="'+item.invnr+'"><td>'+((++globalIndex)+1)+'</td><td>'+item.invnr+'</td><td>'+item.gname+'</td><td>'+
					'<label class="toggle"><input class="toggle-checkbox" name="zuordnen'+item.invnr+'" value="yes" type="checkbox" checked="checked"><div class="toggle-switch"></div><span class="toggle-label"></span></label>'
					+'</td></tr>')
					itemList.push({ 
												invnr:item.invnr,
												gname:item.gname,
												place:item.invroom.location.place.pnname,
												address:item.invroom.location.address,
												location_id:item.invroom.location.id,
												room_id_old:item.invroom.rname,
												room_id_new:$("#room_id_inventur").val(),
												room:item.invroom.rname,
												zuordnen:1
					});
				$('body #inventur_check_input').val('');
				$("body #inventur_check_input" ).focus();
			});
		}
	});

$( document ).on( "click","body #inventur_submit",function() {
    $.ajax({
			type:'post',
			url:"{{ route('inventurStoreFinal') }}",
			data:{'itemList':itemList},
			success:function(resp){
					console.log(resp);
					let WinPrint = window.open('/print_inventur?val='+JSON.stringify(resp),'', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
					WinPrint.document.close();
					WinPrint.focus();
					WinPrint.print();
					setInterval(function(){ WinPrint.close()}, 3000);
			},error:function(){
					alert("Error");
			}
    });
});

//************************************************************* Bewegen ************************************************************//
	let selectAddress = new Array();
	$( document ).on( "click", "#move_modal", function() {
	$('#move').modal('show');
	// Empty Values
		$('#search_move').val('');
		$('body .move_form').trigger('reset')


	$(document).on('keyup change', '#search_move', function(){
		let search_move = $(this).val();
		$.ajax({
			type:'post',
			url:"{{ route('search_check_move') }}",
			data:{search_move:search_move},
			success:function(resp){
				if(resp=="false"){
					$("body #chksrchmove").removeClass('fas fa-ellipsis-h').addClass('fas fa-times-circle').css('color', '#d9534f');
				}else{
					if(resp =="true") {
						$("body #chksrchmove").removeClass('fas fa-times-circle').addClass('fas fa-check').css('color', '#5cb85c');
						$.ajax({
							type: 'get',
							url:"{{ route('search_move') }}",
							data: {search_move:search_move},
							success:function(resp){
								selectAddress = new Array();
								$('#location_id_move').find('optgroup').remove();
								$('#location_id_move').find('option').remove();
								$('#location_id_move').append(new Option("Standort...",0));
								$('body .move_form .move_address').val(resp.items.invroom.location.address)
								$('body .move_form .move_raum').val(resp.items.invroom.rname)
								$('body .move_form .gname_move').val(resp.items.gname)
								$.each(resp['places'], function(index, item) {
								$("body #location_id_move").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
								});
								$.each(resp['locations'], function(index, item) {
								$("#location_id_move #"+item.place_id).append(new Option(item.address,item.id));
								selectAddress.push(item);
								});
							},error:function(){
								alert("Error");
							}
						});
					}
				}
			}
		});
	});
});

$( document ).on( "change", "#location_id_move", function() {
	$('#room_id_move').find('option').remove();
	$("#room_id_move").append(new Option("Raum...",''));
	for(let i = 0; i<selectAddress.length ; i++){
		if(selectAddress[i].id == $( this ).val()){
			$.each(selectAddress[i].invrooms, function(index, item) {
				$("body #room_id_move").append(new Option(item.rname+' ('+item.altrname+')',item.id));
			});
		}
	}
});

//************************************************************* Print Label ************************************************************//
let locationData = new Array();
let text = '';
$( document ).on( "click", "#etiketten_modal", function() {
	$('#printpage').modal('show');
	$('#anzahl').val(1);
	$('#address').find('option').remove();
	$("#address").append(new Option("Bitte Wählen...",0));
	$('.inventNumber').val('');
	locationData = new Array();
	$.ajax({
		type: "GET",
		url: "{{ route('auto') }}", //Route NAME USED
		}).done(function( data ) {
			$.each(data, function(index, item) {
			$("#address").append(new Option(item.location.address,item.location_id));
			locationData.push(item);
		});
	});
});

$( document ).on( "change", "#address", function() {
	for(let i = 0; i<locationData.length ; i++){
		if(locationData[i].location_id == $( this ).val()){
			texty = locationData[i].location_id + '-' + (parseInt(locationData[i].last_inv_num) + 1) + '-' + locationData[i].suffix;
		}
	}
	$('.inventNumber').val(texty);
});

//************************************************************* Create ************************************************************//
$( document ).on( "click", "#add_modal", function() {
	$('#add').modal('show');
		//empty form on open
		$('body .kaufpreis').val('');
		$('body .gname').val('');
		myDropzone.removeAllFiles();
		$('body .gtyp').val('');
		$('body .sn').val('');
		$('body .notes').val('');
		$('#location_id').find('option').remove();
		$('#location_id').find('optgroup').remove();
		$('#gart_id').find('option').remove();
		$('#rooms').find('option').remove();
		$('#location_id').append(new Option("Standort...",''));
		$('#gart_id').append(new Option("Geräteart...",''));
		$("#rooms").append(new Option("Raum...",''));
		$('.invnr').val('');
	locationData = new Array(); //********  save the City name, to sort the addresses below each city.  ********//
	$.ajax({
		type: "GET",
		url: "{{ route('item.create') }}",
		}).done(function( data ) {
			$.each(data['places'], function(index, item) {
					$("#location_id").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
			});
			$.each(data['invnr'], function(index, item) {
					$("#location_id #"+item.location.place_id).append(new Option(item.location.address,item.location_id));
					locationData.push(item);
			});
			$.each(data['garts'], function(index, item) {
					$("#gart_id").append(new Option(item.name,item.id));
			});
		});
});

$( document ).on( "change", "#location_id", function() {
	$('#rooms').find('option').remove();
	$("#rooms").append(new Option("Bitte Wählen...",''));
	for(let i = 0; i<locationData.length ; i++){
		if(locationData[i].location_id == $( this ).val()){
			texty = locationData[i].location_id + '-' + (parseInt(locationData[i].last_inv_num) + 1) + '-' + locationData[i].suffix;
			$.each(locationData[i].room, function(index, item) {
				$("#rooms").append(new Option(item.rname+' ('+item.altrname+')',item.id));
			});
		}
	}
	$('.invnr').val(texty);
});

$(function() {
  $('.date').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: parseInt(moment().format('YYYY'))-1,
		maxYear: parseInt(moment().format('YYYY'))+1,
		locale: {
			format: 'YYYY-MM-DD'
		}
  });
});

//************************************************************* Ausmuster ****************************************************//
$(document).ready(function(){
$(document).on( "click", "#invalid_modal", function() {
$('#invalid').modal('show');
});
$(document).on('keyup change', '#search_amg', function(){
	let search = $(this).val();
	$.ajax({
		type:'post',
		url:"{{ route('search_check') }}",
		data:{search:search},
		success:function(resp){
			if(resp=="false"){
				$("body #chksrch").removeClass('fas fa-ellipsis-h').addClass('fas fa-times-circle').css('color', '#d9534f');
			}else{
				if(resp =="true") {
					$("body #chksrch").removeClass('fas fa-times-circle').addClass('fas fa-check').css('color', '#5cb85c');
					$.ajax({
						type:'get',
						url:"{{ route('search') }}",
						data:{search:search},
						success:function(resp){
							$('body .amg_form .gname_amg').val(resp.items.gname)
							$('body .amg_form .inventarnummer_amg').val(resp.items.invnr)
							$('body .amg_form .andat_amg').val(resp.items.andat)
							$('body .amg_form .kp_amg').val(resp.items.kp)
							$('body .amg_form .standort_amg').val(resp.room.invroom.location.address)
							$('body .amg_form .raum_amg').val(resp.room.invroom.rname)
							$('body .amg_form .gart_amg').val(resp.items.garts.name)
							$('body .amg_form .gtyp_amg').val(resp.items.gtyp)
							$('body .amg_form .sn_amg').val(resp.items.sn)
							$('body .amg_form .notes_amg').val(resp.items.notes)
							$('body #grund').find('option').remove();
							$('body #grund').append(new Option("Grund...",''));
							$.each(resp.amgs, function(index, item){
								$("body #grund").append(new Option(item.name,item.id));
							});
						},error:function(){
							alert("Error");
						}
					});
				}
			}
		},error:function(){
			alert("Error");
		}
	});
});
});

//************************************************************* Edit ************************************************************//
$(document).on( "click", "#edit_modal", function() {
// Empty Values
$('#search_edit').val('');
$('body .item_edit_form').trigger('reset')
$('#edit').modal('show');
$(document).on('keyup change', '#search_edit', function(){
	let search_edit = $(this).val();
	if( search_edit != '' ){
		let _token = $('input[name="_token"]').val();
		$.ajax({
			type: 'post',
			url:" {{ route('autocompleteEdit') }}",
			data: {search_edit:search_edit,_token:_token},
			success:function(data){
				$('body #theList').fadeIn();
				$('body #theList').html(data);
			}
		});
	}
	$.ajax({
		type:'post',
		url:"{{ route('search_check_edit') }}",
		data:{search_edit:search_edit},
		success:function(resp){
			if(resp=="false"){
				$("body #chksrchedit").removeClass('fas fa-ellipsis-h').addClass('fas fa-times-circle').css('color', '#d9534f');
			}else{
				if(resp =="true") {
                $("body #chksrchedit").removeClass('fas fa-times-circle').addClass('fas fa-check').css('color', '#5cb85c');
                $("body .pdf_edit_green").hide();
                $("body .pdf_edit_red").show();
					$.ajax({
						type:'get',
						url:"{{ route('search_edit') }}",
						data:{search_edit:search_edit},
						success:function(resp){
							if(resp.items.path_to_rg) {
								$("body .pdf_edit_green").show();
								$("body .pdf_edit_red").hide();
								$("body .pdf_edit_green").attr("href", "/inventar/rechnungen/"+resp.items.path_to_rg);
							}
							$('body .item_edit_form .invnr_edit').val(resp.items.invnr)
							$('body .item_edit_form .gname_edit').val(resp.items.gname)
							$('body .item_edit_form .andat_edit').val(resp.items.andat)
							$('body .item_edit_form .kp_edit').val(resp.items.kp)
							$('body .item_edit_form .standort_edit').val(resp.room.invroom.location.address)
							$('body .item_edit_form .raum_edit').val(resp.room.invroom.rname)
							$('body .item_edit_form .gart_edit').val(resp.items.garts.name)
							$('body .item_edit_form .gtyp_edit').val(resp.items.gtyp)
							$('body .item_edit_form .sn_edit').val(resp.items.sn)
							$('body .item_edit_form .notes_edit').val(resp.items.notes)
						},error:function(){
							alert("Error");
						}
					});
				}
			}
		},error:function(){
			alert("Error");
		}
	});
});
});

function printfunction() {
	$('#printpage').modal('show');
	let printinvnr = $('#prntinvnr').val();
	let anzahl = $('#anzahl').val();
	let WinPrint = window.open('/print/'+printinvnr+'/'+anzahl, '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
	WinPrint.document.close();
	WinPrint.focus();
	WinPrint.print();
	setInterval(function(){ WinPrint.close()}, 3000);
	}
//************************************************************* Man. Create *****************************************************//
let locationSelect = new Array();
$(document).on( "click", "#add_modal_man", function() {
	// empty form on open function
	$('#add_man').modal('show');
	$('#location_id_man').find('option').remove();
	$('#location_id_man').find('optgroup').remove();
	locationSelect = new Array();
	$('#gart_id_man').find('option').remove();
	$('#gart_id_man').append(new Option("Geräteart...",0));
	$('#location_id_man').append(new Option("Standort...",0));
	$('#rooms_id_man').find('option').remove();
	$("#rooms_id_man").append(new Option("Raum...",''));
$.ajax({
	type: "GET",
	url: "{{ route('item.create_man') }}",
	}).done(function(data) {
		$.each(data['places'], function(index, item) {
			$("#location_id_man").append('<optgroup label="'+index+'" id="'+item+'" ></optgroup>');
		});
		$.each(data['locations'], function(index, item){
			$("#location_id_man #"+item.place_id).append(new Option(item.address,item.id));
			locationSelect.push(item);
		});
		$.each(data['garts'], function(idex,item){
			$("#gart_id_man").append(new Option(item.name,item.id));
		})
	});
});

$( document ).on( "change", "#location_id_man", function() {
	$('#rooms_man').find('option').remove();
	$("#rooms_man").append(new Option("Raum...",''));
	for(let i = 0; i<locationSelect.length ; i++){
		if(locationSelect[i].id == $( this ).val()){
			$.each(locationSelect[i].invrooms, function(index, item) {
					$("#rooms_man").append(new Option(item.rname+' ('+item.altrname+')',item.id));
				});
			}
		}
	});

$(function() {
  $('.date_man').daterangepicker({
	singleDatePicker: true,
	showDropdowns: true,
	minYear: parseInt(moment().format('YYYY'))-1,
	maxYear: parseInt(moment().format('YYYY'))+1,
	locale: {
	  format: 'YYYY-MM-DD'
	}
  });
});

// drop zone
Dropzone.options.dropzoneForm = {
	autoProcessQueue : false,
	acceptedFiles : ".pdf",
	maxFiles:1,
	init:function(){
	  var submitButton = document.querySelector(".submit_form_ajax");
	  myDropzone = this;
	  submitButton.addEventListener('click', function(){
		myDropzone.processQueue();
	  });
	  this.on("addedfile", function(data){
			$('.submit_form_ajax').css('visibility','visible');
			$('.submit_form').css('visibility','hidden');
	  });
	  this.on("complete", function(data){
		$('.path_to_rg').val(data.xhr.response);
		// load_images();
		$('#item_form').submit();
	  });
	}
  };
//   load_images();
  function load_images()
  {
	$.ajax({
	  url:"{{ route('dropzone.fetch_pdf') }}",
	  success:function(data)
	  {
		$('#uploaded_pdf').html(data);
	  }
	})
  }
  $(document).on('click', '.remove_pdf', function(){
	var name = $(this).attr('id');
	$.ajax({
	  url:"{{ route('dropzone.delete_pdf') }}",
	  data:{name : name},
	  success:function(data){
		load_images();
	  }
	})
  });


// drop zone man
Dropzone.options.dropzoneFormMan = {
	autoProcessQueue : false,
	acceptedFiles : ".pdf",
	maxFiles:1,
	init:function(){
	  var submitButton = document.querySelector(".submit_form_ajax_man");
	  myDropzoneMan = this;
	  submitButton.addEventListener('click', function(){
		myDropzoneMan.processQueue();
	  });
	  this.on("addedfile", function(data){
          console.log('sdklfjösdalkjf');
		  $('.submit_form_ajax_man').css('visibility','visible');
		  $('.submit_form_man').css('visibility','hidden');
	});
	this.on("complete", function(data){
	  $('.path_to_rg_man').val(data.xhr.response);
	  // load_images();
	  $('#item_form_man').submit();
	});
  }
};
//   load_images();
  function load_images()
  {
	$.ajax({
	  url:"{{ route('dropzone.fetch_pdf_man') }}",
	  success:function(data)
	  {
		$('#uploaded_pdf_man').html(data);
	  }
	})
  }
  $(document).on('click', '.remove_pdf', function(){
	var name = $(this).attr('id');
	$.ajax({
	  url:"{{ route('dropzone.delete_pdf_man') }}",
	  data:{name : name},
	  success:function(data){
		load_images();
	  }
	})
  });



//************************************************************* Dropzone ***********************************
  Dropzone.prototype.defaultOptions.dictDefaultMessage = "Legen Sie die PDF-Datei hier ab, um sie hochzuladen";
  Dropzone.prototype.defaultOptions.dictFallbackMessage = "Ihr Browser unterstützt Drag&Drop Dateiuploads nicht";
  Dropzone.prototype.defaultOptions.dictFallbackText = "Benutzen Sie das Formular um Ihre Dateien hochzuladen";
  Dropzone.prototype.defaultOptions.dictInvalidFileType = "Eine Datei dieses Typs kann nicht hochgeladen werden";
  Dropzone.prototype.defaultOptions.dictCancelUpload = "Hochladen abbrechen";
  Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "null";
  Dropzone.prototype.defaultOptions.dictRemoveFile = "Datei entfernen";
  Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Sie können keine weiteren Dateien mehr hochladen.";


</script>
@endsection



