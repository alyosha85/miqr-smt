
<div class="modal fade" id="inventur" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inventur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <div class="form-row mb-3">
                    <div class="form-group col-md-4">
                        <select id="location_id_inventur" name="location_id" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="room_id_inventur" name="room_id" class="form-control" required>
                        </select>
										</div>
										<div class="form-group col-md-4">
											<input type="text" id="inventur_check_input" class="form-control" onblur="this.focus()" style="opacity: 0;" autofocus>  
										</div>
									</div>
                <table class="table" id="table_inventur" style="display: none;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Inventarnummer</th>
                        <th scope="col">Gerätename</th>
                        <th scope="col">Zuordnen</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                <button type="submit" id="inventur_submit" class="btn btn-primary">Einfugen</button>
            </div>
        </div>
    </div>
</div>
