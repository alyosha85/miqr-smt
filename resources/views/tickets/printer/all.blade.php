@extends('layouts.admin_layout.admin_layout')

<style>
    
  /*----  Main Style  ----*/
    #cards_landscape_wrap-2{
      text-align: center;
      background: #F7F7F7;
    }
    #cards_landscape_wrap-2 .container{
      padding-bottom: 100px;
    }
    #cards_landscape_wrap-2 a{
      text-decoration: none;
      outline: none;
    }
    #cards_landscape_wrap-2 .card-flyer {
      border-radius: 50px;
    }
    #cards_landscape_wrap-2 .card-flyer .image-box{
      background: #ffffff;
      overflow: hidden;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
      border-radius: 50px;
    }
    #cards_landscape_wrap-2 .card-flyer .image-box img{
      -webkit-transition:all .9s ease; 
      -moz-transition:all .9s ease; 
      -o-transition:all .9s ease;
      -ms-transition:all .9s ease; 
      width: 100%;
      height: 200px;
    }
    #cards_landscape_wrap-2 .card-flyer:hover .image-box img{
      opacity: 0.7;
      -webkit-transform:scale(1.15);
      -moz-transform:scale(1.15);
      -ms-transform:scale(1.15);
      -o-transform:scale(1.15);
      transform:scale(1.15);
    }
    #cards_landscape_wrap-2 .card-flyer .text-box{
      text-align: center;
    }
    #cards_landscape_wrap-2 .card-flyer .text-box .text-container{
      padding: 30px 18px;
    }
    #cards_landscape_wrap-2 .card-flyer{
      background: #FFFFFF;
      margin-top: 50px;
      -webkit-transition: all 0.2s ease-in;
      -moz-transition: all 0.2s ease-in;
      -ms-transition: all 0.2s ease-in;
      -o-transition: all 0.2s ease-in;
      transition: all 0.2s ease-in;
      box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.40);
    }
    #cards_landscape_wrap-2 .card-flyer:hover{
      background: #fff;
      box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.50);
      -webkit-transition: all 0.2s ease-in;
      -moz-transition: all 0.2s ease-in;
      -ms-transition: all 0.2s ease-in;
      -o-transition: all 0.2s ease-in;
      transition: all 0.2s ease-in;
      margin-top: 50px;
    }
    #cards_landscape_wrap-2 .card-flyer .text-box p{
      margin-top: 10px;
      margin-bottom: 0px;
      padding-bottom: 0px; 
      font-size: 14px;
      letter-spacing: 1px;
      color: #000000;
    }
    #cards_landscape_wrap-2 .card-flyer .text-box h6{
      margin-top: 0px;
      margin-bottom: 4px; 
      font-size: 18px;
      font-weight: bold;
      text-transform: uppercase;
      font-family: 'Roboto Black', sans-serif;
      letter-spacing: 1px;
      color: #671926;
    }

    /* info box */

    #cards_landscape_wrap-2 .card-flyer2 .text-box2 p{
      margin-top: 10px;
      margin-bottom: 0px;
      padding-bottom: 0px; 
      font-size: 14px;
      letter-spacing: 1px;
      color: #85323E;
    }
    #cards_landscape_wrap-2 .card-flyer2 .text-box2 h2{
      margin-top: 0px;
      margin-bottom: 4px; 
      font-size: 18px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #85323E;
    }
    #cards_landscape_wrap-2 .card-flyer2 .text-box2 ul{
      letter-spacing: 1px;
      font-size: 18px;
      font-weight: bold;
      color: #85323E;
    }
</style>

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1 class="ticket_header">Drucker</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid col-lg-12">
        <div class="row">
          <div class="col-12 mx-auto">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile form-group">

                <!-- child cards -->
                <div class="row mx-auto justify-content-center">
                  <!-- second card -->
                  <div class="col-lg-12">
                    <div class="card card-primary card-outline" id="underform">
                      <!-- Content here -->
                      <div id="cards_landscape_wrap-2">
                        <div class="container">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 h-100" id="info_printer_printer">
                              <a href="{{route('printer_in_out')}}">
                                <div class="card-flyer">
                                  <div class="text-box">
                                    <div class="image-box">
                                      <img src="/images/admin_images/Printer_Walk_300.png" alt="" />
                                    </div>
                                    <div class="text-container">
                                      <h6>Drucker einrichten</h6>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 h-100" id="info-scanner">
                              <a href="{{route('scanner')}}">
                                <div class="card-flyer">
                                  <div class="text-box">
                                    <div class="image-box">
                                        <img src="/images/admin_images/scanner_300.png" alt="" />
                                    </div>
                                    <div class="text-container">
                                        <h6>Scanner Probleme</h6>
                                    </div>
                                  </div>
                                </div>
                              </a>
                              </div>
                              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 h-100" id="info_functuality">
                                <a href="{{route('functuality')}}">
                                  <div class="card-flyer">
                                    <div class="text-box">
                                      <div class="image-box">
                                          <img src="/images/admin_images/function_300.png" alt="" />
                                      </div>
                                      <div class="text-container">
                                          <h6>Funktionsanfrage</h6>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 h-100" id="info_error">
                                <a href="{{route('errors')}}">
                                  <div class="card-flyer">
                                    <div class="text-box">
                                      <div class="image-box">
                                          <img src="/images/admin_images/x_300.png" alt="" />
                                      </div>
                                      <div class="text-container">
                                          <h6>Probleme</h6>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 h-100"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 h-100 align-self-center" id="tooltip_box_printer" >
                              <!-- ! Jquery forms here --> 

                              <!-- ! Jquery forms ends here -->
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!--end second card -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection

@section('script')
<script>
  $(document).ready(function() {
let underform = $('div #tooltip_box_printer');
let rm_children = underform.children().remove();
rm_children;

$('#info_printer_printer').hover(function(){
  underform.children().remove();
    underform.append(
    `
    <div class="card-flyer2">
        <div class="text-box2">
          <div class="text-container2">
            <img src="/images/admin_images/info_400_2.png" style="max-width:100px;  alt="" />
            <h2>Drucker Einrichten</h2>
              <ul class="list-unstyled">
                <li>Druckerinstallation etc.</li>
                <br>
              </ul>
          </div>
        </div>
      </div>
    `
    );
    },function(){
        underform.children().remove(); 
  })

  $('#info-scanner').hover(function(){
  underform.children().remove();
    underform.append(
    `
    <div class="card-flyer2">
        <div class="text-box2">
          <div class="text-container2">
            <img src="/images/admin_images/info_400_2.png" style="max-width:100px;  alt="" />
            <h2>Scanner Probleme</h2>
              <ul class="list-unstyled">
                <li>Scanner einrichten oder Probleme mit dem Scanner melden</li>
                <br>
              </ul>
          </div>
        </div>
      </div>
    `
    );
    },function(){
        underform.children().remove(); 
  })

  $('#info_functuality').hover(function(){
  underform.children().remove();
    underform.append(
    `
    <div class="card-flyer2">
        <div class="text-box2">
          <div class="text-container2">
            <img src="/images/admin_images/info_400_2.png" style="max-width:100px;  alt="" />
            <h2>Funktionsanfrage</h2>
              <ul class="list-unstyled">
                <li>Weiß Keine...</li>
                <br>
              </ul>
          </div>
        </div>
      </div>
    `
    );
    },function(){
        underform.children().remove(); 
  })

  $('#info_error').hover(function(){
  underform.children().remove();
    underform.append(
    `
    <div class="card-flyer2">
        <div class="text-box2">
          <div class="text-container2">
            <img src="/images/admin_images/info_400_2.png" style="max-width:100px;  alt="" />
            <h2>Probleme</h2>
              <ul class="list-unstyled">
                <li>Probleme bei Druck, Kopie etc.</li>
                <br>
              </ul>
          </div>
        </div>
      </div>
    `
    );
    },function(){
        underform.children().remove(); 
  })

 

 
  })
</script>
@endsection