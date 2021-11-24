<div class="col-lg-4">
  <div class="card card-primary card-outline">
    <div class="card-body box-profile form-group">
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