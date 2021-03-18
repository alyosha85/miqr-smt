@extends('layouts.admin_layout.admin_layout')
<link rel="stylesheet" href="{{ url ('bootstrap_modal/bootstrap-side-modals.css') }}">
@section('content')

<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
      <div class="col-6 mx-auto">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Rolle</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
          <tr>
            <th scope="row">{{$role->id}}</th>
            <td>{{$role->name}}</td>
            <td class="text-right">
              <button id="role_view_modal" class="btn btn-outline-success"><i class="far fa-eye"></i></button>
              <button class="btn btn-outline-primary"><i class="fas fa-pen-alt"></i></button>
              <button class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div> <!-- col 3-->
		</div>
	</div>
</section>


@include('settings.modal_settings.roles.roles_view')
@endsection

@section('script')
<script>
  $(document).ready(function(){
	//**** Add City ****//
	$(document).on('click','#role_view_modal',function(){
		$('#role_view').modal('show');
	});

//*******************************************************************************
  // Select With Checkbox(Inventur)
  $("body #select-all-settings-inventory").change(function() {
    var checked = $(this).is(":checked");
    if (checked) {
      $("body .settings-inventory-checkbox").each(function() {
        $(this).prop("checked", true);
      });
    } else {
      $("body .settings-inventory-checkbox").each(function() {
        $(this).prop("checked", false);
      });
    }
  });
  // Changing state of CheckAll checkbox
  $("body .settings-inventory-checkbox").click(function() {
    if ($("body .settings-inventory-checkbox").length == $("body .settings-inventory-checkbox:checked").length) {
      $("#select-all-settings-inventory").prop("checked", true);
      $("#select-all-settings-inventory").prop("indeterminate", null);
    }else if($("body .settings-inventory-checkbox:checked").length <= 0) {
      $("#select-all-settings-inventory").prop("indeterminate", false);
      $("#select-all-settings-inventory").prop("checked", false);
    }else if($("body .settings-inventory-checkbox").length > 0){
      $("#select-all-settings-inventory").prop("checked", false);
      $("#select-all-settings-inventory").prop("indeterminate", true);
      // $("#checkall").removeAttr("checked");
    }
  });

});




</script>
@endsection