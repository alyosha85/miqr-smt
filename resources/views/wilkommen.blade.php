@extends('layouts.admin_layout.admin_layout')

<style>
  #hat {
  width: 100px;
  height: 100px;
  position: absolute;
  left: -30;
  top: 0;
  transform: translate(50%,-50%);
  z-index: 100;
}
 
.onoffswitch3
{
    position: relative; 
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch3-checkbox {
    display: none;
}

.onoffswitch3-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 0px solid #999999; border-radius: 0px;
}

.onoffswitch3-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch3-inner > span {
    display: block; float: left; position: relative; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: 'Montserrat', sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch3-inner .onoffswitch3-active {
    padding-left: 10px;
    background-color: #EEEEEE; color: #FFFFFF;
}

.onoffswitch3-inner .onoffswitch3-inactive {
    width: 100px;
    padding-left: 16px;
    background-color: #EEEEEE; color: #FFFFFF;
    text-align: right;
}

.onoffswitch3-switch {
    display: block; width: 50%; margin: 0px; text-align: center; 
    border: 0px solid #999999;border-radius: 0px; 
    position: absolute; top: 0; bottom: 0;
}
.onoffswitch3-active .onoffswitch3-switch {
    background: #681a24; left: 0;
    width: 160px;
}
.onoffswitch3-inactive{
    background: #681a24 !important; right: 0;
    width: 20px;
}
.onoffswitch3-checkbox:checked + .onoffswitch3-label .onoffswitch3-inner {
    margin-left: 0;
}

.glyphicon-remove{
    padding: 3px 0px 0px 0px;
    color: #fff;
    background-color: #000;
    height: 25px;
    width: 25px;
    border-radius: 15px;
    border: 2px solid #fff;
}

.scroll-text{
    color: #000;
}

* {
	 box-sizing: border-box;
}
 
</style>
@section('content')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
<!-- News -->
    <div class="onoffswitch3">
      <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
      <label class="onoffswitch3-label" for="myonoffswitch3">
          <span class="onoffswitch3-inner">
              <span class="onoffswitch3-active">
                  <marquee class="scroll-text">&nbsp;&nbsp;
                    Lorem ipsum dolor sit amet.  &nbsp;&nbsp;
                    <i class="fas fa-grip-lines-vertical"></i>&nbsp;&nbsp;
                    Lorem ipsum dolor sit amet. &nbsp;&nbsp;
                    <i class="fas fa-grip-lines-vertical"></i>&nbsp;&nbsp;
                    Lorem ipsum dolor sit amet. &nbsp;&nbsp;
                    </marquee>

                  <span class="onoffswitch3-switch">Neuigkeiten <i class="fas fa-times"></i></span>
              </span>
              <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">Zeigen</span></span>
          </span>
      </label>
  </div>
  <!-- End News -->
  <section class="content-header text-center">
    <div class="container fluid">
      <div class="row">
        <div class="col-12 mx-auto">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
<section class="content">
  <div class="container-fluid col-lg-12">
    <div class="row">
      <div class="col-12 mx-auto">
        <!-- Profile Image -->
              <!-- child cards -->
              <div class="row mx-auto">
                <!-- first card -->
                <div class="col-lg-9">
                  <div class="card card-primary card-outline">
                    <div class="position-relative">
                      <img id="hat" src="/images/admin_images/halloween2.png" alt="hat">
                      <div class="card-body box-profile form-group">

                        <div class="row">
                          <div class="col-sm-6">
                            <video
                            fluid="true"
                            id="my-video"
                            class="video-js"
                            controls
                            preload="auto"
                            width="550"
                            height="300"
                            data-setup="{}"
                          >
                            <source src="/images/admin_images/tutorial_2.mp4" type="video/mp4" />
                          </video>

                                                            
                          </div>
                          <div class="col-sm-6">
                           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolores assumenda aliquam illum consectetur dicta inventore? Tenetur inventore repellat necessitatibus, delectus cumque odio pariatur commodi cupiditate enim aut cum repudiandae assumenda obcaecati veritatis rem libero! </p>
                        </div>
                      </div>






                      <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                </div>
                <!--end first card -->
                <!-- second card -->
                      <div class="col-lg-3">
                        <!-- Card  -->
                        <div class="card card-primary card-outline">
                          <div class="card-body">
                            <h5 class="card-title mb-3"><strong>Shortcut links</strong></h5>
                            <div class="card-text">
                              <div class="list-group">
                                <a href="{{route ('profile')}}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="far fa-user fa-lg"></i><strong> Profil Bearbeiten</strong></a>
                                <a href="{{ url('/contacts') }}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="far fa-address-book fa-lg"></i><strong> Adressbuch</strong></a>
                                <a href="{{ route('ticket.index') }}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="fas fa-ticket-alt fa-lg"></i><strong> Ticket Erstellen</strong>
                                <a href="{{ route('ticket.usertickets') }}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="fas fa-clipboard-list fa-lg"></i><strong> Mein Tickets</strong>
                                </a>
                              </div><!-- End Linst Group -->
                            </div><!-- End Card Text -->
                          </div><!-- End Card Body -->
                        </div> <!-- End Card  -->
                      </div><!-- End First Section -->
                <!--end second card -->
            </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
<!-- /.content-wrapper -->



	</div>
</section>

@endsection

@section('script')
<script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>

@endsection



