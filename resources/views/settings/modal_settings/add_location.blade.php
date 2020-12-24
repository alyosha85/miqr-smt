<div class="modal fade" id="addLocation" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adresse hinzufügen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
      <div class="modal-body">

				<div class="form-group">
					<label for="exampleInputEmail1">Städte</label>
					<select class="form-control" id="settings_cityList" name="pnname"></select>
					<small class="form-text text-muted">Bitte wählen Sie eine Stadt aus, um eine Adresse hinzuzufügen.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Adresse</label>
					<input type="text" class="form-control" id="settings_address_input" placeholder="Adresse">
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
        <button type="button" id="#addLocationButton" class="btn btn-primary">Einreichen</button>
			</div>
    </div>
  </div>
</div>