@extends('layouts.admin_layout.admin_layout')

@section('content')
<style>
	.list-group-item
{
  overflow:hidden;  
  position: relative;
  display: block;
  padding: 10px 15px;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid #ddd;
}
</style>


<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- First Section -->
			<div class="col-3">
				<!-- Card  -->
				<div class="card card-info card-outline">
					<div class="card-body">
						<h5 class="card-title mb-3"><strong>Inventur Einstellungen</strong></h5>
						<div class="card-text">
							<div class="list-group">
								<a href="javascript:" id="addCity_modal" class="list-group-item list-group-item-action list-group-item-info py-1">Neue Stadt hinzufügen
									 &nbsp; <i class="fas fa-map-marker-alt"></i>
								</a>
								<a href="javascript:" id="addLocation_modal" class="list-group-item list-group-item-action list-group-item-info py-1">Neue Adresse hinzufügen
									 &nbsp; <i class="fas fa-building"></i>
								</a>
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Neuen Raum hinzufügen
									&nbsp; <i class="fas fa-chalkboard-teacher"></i>
								</a>
							</div><!-- End Linst Group -->
						</div><!-- End Card Text -->
					</div><!-- End Card Body -->
				</div> <!-- End Card  -->
			</div><!-- End First Section -->
			<!-- second section -->
			<div class="col-3">
				<!-- Card  -->
				<div class="card card-info card-outline">
					<div class="card-body">
						<h5 class="card-title mb-3"><strong>Hard Code</strong></h5>
						<div class="card-text">
							<div class="list-group">
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Hard Code</a>
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Hard Code</a>
							</div><!-- End Linst Group -->
						</div><!-- End Card Text -->
					</div><!-- End Card Body -->
				</div><!-- End Card  -->
			</div><!-- End Second Section -->
			<!-- third section -->
			<div class="col-3">
				<div class="card card-info card-outline">
					<div class="card-body">
						<h5 class="card-title mb-3"><strong>Hard Code</strong></h5>
						<div class="card-text">
							<div class="list-group">
								<a href="javascript:" class="list-group-item list-group-item-action list-group-item-info py-1">Hard Code</a>
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Hard Code</a>
							</div><!-- End Linst Group -->
						</div><!-- End Card Text -->
					</div><!-- End Card Body -->
				</div><!-- End Card  -->
			</div><!-- End Third Section -->
			<!-- Forth section -->
			<div class="col-3">
				<div class="card card-info card-outline">
					<div class="card-body">
						<h5 class="card-title mb-3"><strong>Hard Code</strong></h5>
						<div class="card-text">
							<div class="list-group">
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Hard Code</a>
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Hard Code</a>
							</div><!-- End Linst Group -->
						</div><!-- End Card Text -->
					</div><!-- End Card Body -->
				</div><!-- End Card  -->
			</div><!-- End Forth Section -->
		</div>
	</div>
</section>

@include('settings.modal_settings.add_city')
@include('settings.modal_settings.add_location')


@endsection

@section('script')
<script>
$(document).ready(function(){
	//**** Add City ****//
	$(document).on('click','#addCity_modal',function(){
		$('#addCity').modal('show');
	});

	//**** Add Location ****//
	// 1 **** Add Location ****// 
		$(document).on('click','#addLocation_modal',function(){
			$('#addLocation').modal('show');
			$('#settings_cityList').find('option').remove();
			$('#settings_cityList').append(new Option("Standort...",''));
			$('#settings_address_input').prop('readonly',true);
			$.ajax({
				type: 'get',
				url: '{{route("settings.cityList")}}',
				}).done(function (data){
					$.each(data['cities'],function(index,item){
						console.log(item);
						$('#settings_cityList').append(new Option(item.pnname,item.id));
					});
				});
		});

		// 2 **** Add Location ****// 
		$(document).on('change','#settings_cityList',function(){
			$('#settings_address_input').prop('readonly',false);
		});

		$(document).on('click','body #addLocationButton',function(){
			console.log('DSfasda');
			$.ajax({
				type:'post',
				url: '{{route("addLocation")}}',
				data:{addLocation:addLocation},
				success:function(resp){
					console.log(resp);
				},error:function(){
					alert("Error");
				}
			});
		});






});

</script>
@endsection