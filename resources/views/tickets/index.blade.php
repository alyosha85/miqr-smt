@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Ticketanfrage'])
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
                <div class="col-lg-12 ">
                  <div class="card card-primary card-outline" id="underform">
                    <!-- Content here -->
                    <div id="cards_landscape_wrap-2">
                      <div class="container">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 d-flex align-items-stretch">
                              <div class="card-flyer">
                                <div class="text-box">
                                <a href="{{route('computer_all')}}">
                                  <div class="image-box">
                                    <img src="/images/admin_images/network_300.png" alt="" />
                                  </div></a>
                                    <div class="text-container">                                    
                                      <h6>PC / Laptop </h6>
                                    <ul class="list-unstyled">
                                      <li><a href="{{route('softwareRequest')}}">Softwareanfrage</a></li>
                                      <li><a href="{{route('peripheralRequest')}}">peripherie-Anfrage</a></li>
                                      <li><a href="{{route('hardwareRequest')}}">Hardware-Anfrage</a></li>
                                      <li><a href="{{route('pc_problems')}}">Probleme</a></li>
                                      <li><a href="{{route('printer_in_out')}}">Drucker Hinzu. / Ent.</a></li>
                                      <li><a href="{{route('other')}}">Sonstiges</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 d-flex align-items-stretch">
                              <div class="card-flyer">
                                <div class="text-box">
                                  <a href="{{route ('printer_all')}}">
                                  <div class="image-box">
                                    <img src="/images/admin_images/Printer_300.png" alt="" />
                                  </div></a>
                                  <div class="text-container">    
                                      <h6>Drucker</h6>
                                      <ul class="list-unstyled">
                                        <li><a href="{{route('printer_in_out')}}">Neuen Drucker einrichten</a></li>
                                        <li><a href="{{route('hardwareRequest')}}">Hardware-Anfrage</a></li>
                                        <li><a href="{{route('scanner')}}">Scanner Probleme</a></li>
                                        <li><a href="{{route('functuality')}}">Funktionsanfrage</a></li>
                                        <li><a href="{{route('errors')}}">Fehlermeldung</a></li>
                                      </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 d-flex align-items-stretch">
                              <div class="card-flyer">
                                <div class="text-box">
                                  <a href="{{route ('telephone_all')}}">
                                    <div class="image-box">
                                        <img src="/images/admin_images/Phone_300.png" alt="" />
                                    </div></a>
                                    <div class="text-container">
                                        <h6>Telefon</h6>
                                        <ul class="list-unstyled">
                                          <li><a href="{{route ('tel_problems')}}">Probleme</a></li>
                                          <li><a href="{{route ('tel_problems')}}">Änderungen</a></li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 d-flex align-items-stretch">
                              <div class="card-flyer">
                                <div class="text-box">
                                  <a href="">
                                  <div class="image-box">
                                      <img src="/images/admin_images/Help_300.png" alt="" />
                                  </div></a>
                                    <div class="text-container">
                                        <h6>Benutzer</h6>
                                        <ul class="list-unstyled">
                                          <li><a href="">Neuer Mitarbeiter</a></li>
                                          <li><a href="">Neuer Benutzer</a></li>
                                          <li><a href="">Passwort ändern / Inaktiv</a></li>
                                          <li><a href="">Namen ändern</a></li>
                                          <li><a href="">Sonstiges</a></li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
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