
<div class="modal fade" id="move" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formular Erfassung</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                 <!-- Search -->
                 <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <input type="search" name="search_move" placeholder="Suchen" id="search_move" aria-describedby="button-addon1" class="form-control border-0 bg-light sform" value="{{ request()->input('search') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <span id="chksrchmove" class="ml-3"></span>
                </div>
            <form action="" method="POST" class="move_form">
                @csrf
                <div class="col-md-12 form-inline">
                    <input type="text" name="address" class="form-control mr-sm-1 col-md-3 move_address" placeholder="Address" readonly>
                    <input type="text" name="raum" class="form-control col-md-2 move_raum" placeholder="Address" readonly>
                    <div class="form-check col-md-1">
                        <i class="fa fa-arrow-right form_control" style="color: #5cb85c;"></i>
                    </div>
                    <select id="location_id_move" name="location_id" class="form-control mr-sm-1 col-md-3" required>
                    </select>
                    <select id="room_id_move" name="room_id" class="form-control mr-sm-1 col-md-2" required>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                <button type="submit" class="btn btn-primary submit_form">Bewegen</button>
            </div>
            </form>
        </div>
    </div>
</div>
