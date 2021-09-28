@extends('layouts.admin_layout.admin_layout')

<style>
  /*----  Main Style  ----*/
    #cards_landscape_wrap-2{
      text-align: center;
      background: #F7F7F7;
    }
    #cards_landscape_wrap-2 .container{
      padding-top: 80px; 
      padding-bottom: 100px;
    }
    #cards_landscape_wrap-2 a{
      text-decoration: none;
      outline: none;
    }
    #cards_landscape_wrap-2 .card-flyer {
      border-radius: 5px;
    }
    #cards_landscape_wrap-2 .card-flyer .image-box{
      background: #ffffff;
      overflow: hidden;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
      border-radius: 5px;
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
</style>

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <div class="container">
        <div class="row">
          <div class="col-6 mx-auto">
            <h1>Submit a Ticket</h1>
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
                    <div class="col-lg-8 ">
                      <div class="card card-primary card-outline" id="underform">
                        <!-- Content here -->
                        <div id="cards_landscape_wrap-2">
                          <div class="container">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                      <a href="">
                                          <div class="card-flyer">
                                            <div class="text-box">
                                              <div class="image-box">
                                                  <img src="/images/admin_images/network_300.png" alt="" />
                                              </div>
                                              <div class="text-container">                                    
                                                  <h6>PC / Laptop </h6>
                                                  <ul class="list-unstyled">
                                                    <li>Software Request </li>
                                                    <li>Performance Problems</li>
                                                    <li>Request New Monitor</li>
                                                    <li>Add Printer</li>
                                                    <li>Network Problems</li>
                                                  </ul>
                                              </div>
                                          </div>
                                        </div>
                                      </a>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                      <a href="">
                                          <div class="card-flyer">
                                            <div class="text-box">
                                              <div class="image-box">
                                                  <img src="/images/admin_images/Printer_300.png" alt="" />
                                              </div>
                                              <div class="text-container">                                    
                                                  <h6>Drucker</h6>
                                                  <ul class="list-unstyled">
                                                    <li>Add Printer</li>
                                                    <li>Software </li>
                                                    <li>Feature Request</li>
                                                    <li>Scanner</li>
                                                    <li>Fehlermeldung</li>
                                                  </ul>
                                              </div>
                                          </div>
                                        </div>
                                      </a>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                      <a href="">
                                          <div class="card-flyer">
                                            <div class="text-box">
                                              <div class="image-box">
                                                  <img src="/images/admin_images/Phone_300.png" alt="" />
                                              </div>
              
                                              <div class="text-container">
                                                  <h6>Telefon</h6>
                                                  <ul class="list-unstyled">
                                                    <li>Not Working</li>
                                                    <li>Request New </li>
                                                    <li>Change Location</li>
                                                    <li>Change the name</li>
                                                    <li>Change the number</li>
                                                    <li>Change the device</li>
                                                  </ul>
                                              </div>
                                          </div>
                                        </div>
                                      </a>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                      <a href="">
                                          <div class="card-flyer">
                                            <div class="text-box">
                                              <div class="image-box">
                                                  <img src="/images/admin_images/Help_300.png" alt="" />
                                              </div>
                                              <div class="text-container">
                                                  <h6>User</h6>
                                                  <ul class="list-unstyled">
                                                    <li>New Employee</li>
                                                    <li>New User</li>
                                                    <li>Change Password / Inactive</li>
                                                    <li>Profil Ordner</li>
                                                    <li>Change name</li>
                                                    <li>others</li>
                                                  </ul>
                                              </div>
                                          </div>
                                        </div>
                                      </a>
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
@endsection