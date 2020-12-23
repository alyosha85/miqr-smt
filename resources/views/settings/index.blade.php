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
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Neue Stadt hinzufügen
									 &nbsp; <i class="fas fa-map-marker-alt"></i>
								</a>
								<a href="#" class="list-group-item list-group-item-action list-group-item-info py-1">Neue Adresse hinzufügen
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
@endsection