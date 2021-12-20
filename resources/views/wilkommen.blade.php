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

.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid black;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 225px;
  padding: 15px 0;
  background-color: black;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 18px/1 'Lato', sans-serif;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}

/* top left*/
.ribbon-top-left {
  top: -10px;
  left: -10px;
}
.ribbon-top-left::before,
.ribbon-top-left::after {
  border-top-color: transparent;
  border-left-color: transparent;
}
.ribbon-top-left::before {
  top: 0;
  right: 0;
}
.ribbon-top-left::after {
  bottom: 0;
  left: 0;
}
.ribbon-top-left span {
  right: -25px;
  top: 30px;
  transform: rotate(-45deg);
}

/* Messy stack of paper */
.paper {
  background: #fff;
  padding: 30px;
  position: relative;
}

.paper,
.paper::before,
.paper::after {
  /* Styles to distinguish sheets from one another */
  box-shadow: 1px 1px 1px rgba(0,0,0,0.25);
  border: 1px solid #bbb;
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
                      <div class="ribbon ribbon-top-left"><span></span></div>
                      <div class="card-body box-profile form-group">
                        
                        <div class="row">
                          <div class="col-sm-6">
                            <!-- <video
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
                          /video> -->
                       

                           <div class="paper">
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:20px;font-family:"Calibri",sans-serif;' class="text-center">Sehr geehrte Mitarbeiterinnen und Mitarbeiter,</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;im Rahmen des Infektionsschutzgesetzes treten ab Mittwoch, den 24.11.2021, neue Regelungen in Kraft.</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong>Allgemein gilt:</strong></p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong>&nbsp;</strong></p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Ab den 24.11.2021 ist es die Pflicht des Arbeitgebers t&auml;glich den Impf-, Genesenen- oder Teststatus jedes und jeder Angestellten zu &uuml;berpr&uuml;fen bevor Sie Ihren Arbeitsplatz betreten.</li>
                                </ul>
                            </div>
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:36.0pt;font-size:15px;font-family:"Calibri",sans-serif;'><u>Einzige Ausnahme</u>: Wenn ein Arbeitgeber Schnelltests in den Betriebsr&auml;umen anbietet, d&uuml;rfen Arbeitnehmerinnen und Arbeitnehmer diese auch ohne Nachweis betreten, jedoch ausschlie&szlig;lich, um sich dort testen zu lassen.</p>
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:36.0pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Von den Zutrittsbeschr&auml;nkungen ausgenommen, sind alle Mitarbeiterinnen und Mitarbeiter, die freiwillig ihren Impf- oder Genesenenstatus an die Standortleitung/Verantwortlichen per Mail (<a href="mailto:Martin.Lorenz@miqr.de"><span style="color:windowtext;">Martin.Lorenz@miqr.de</span></a>, <a href="mailto:Peter.Schmidt@miqr.de"><span style="color:windowtext;">Peter.Schmidt@miqr.de</span></a>, <a href="mailto:Lisa.Zilt@miqr.de"><span style="color:windowtext;">Lisa.Zilt@miqr.de</span></a> und <a href="mailto:Matthias.Kirchner@miqr.de"><span style="color:windowtext;">Matthias.Kirchner@miqr.de</span></a>) melden oder bereits gemeldet haben.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style="color:#1F497D;">&nbsp;</span></strong></p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style="color:#1F497D;">&nbsp;</span></strong></p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong>Was bedeutet dies konkret f&uuml;r Sie:</strong></p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong>&nbsp;</strong></p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Geimpfte oder Genesene, die Ihren Status nicht per E-Mail mitteilen m&ouml;chten, k&ouml;nnen Ihren Nachweis im Sekretariat des jeweiligen Standortes vorlegen. Der Zugang kann jedoch erst gew&auml;hrt werden, wenn der Weiterverarbeitung der Daten zur Umsetzung der 3G-Regel am Arbeitsplatz zugestimmt wird. Erfolgt dies nicht, muss der Nachweis t&auml;glich erneut im Sekretariat vorgezeigt werden.</li>
                                </ul>
                            </div>
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Geimpfte oder Genesene, die keinen Nachweis erbringen, m&uuml;ssen sich entsprechen der geltenden Verordnung testen lassen.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>F&uuml;r Besch&auml;ftigte ohne g&uuml;ltigen Impf- oder Genesenennachweis gilt die Testpflicht gem&auml;&szlig; des aktuell geltenden Infektionsschutzgesetzes.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Die Nachweispflicht obliegt dabei der Verantwortung des Mitarbeiters.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Um einen reibungslosen Ablauf nicht zu gef&auml;hrden, werden wir im Rahmen eines Zusatzangebotes die t&auml;glichen Tests zur Verf&uuml;gung stellen.</li>
                                </ul>
                            </div>
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:36.0pt;font-size:15px;font-family:"Calibri",sans-serif;'>Bitte melden Sie sich bei dem f&uuml;r Ihren Standort zust&auml;ndigen Testbeauftragten (<strong>Erfurt:</strong> Frau Hauke und Herr Ockel; <strong>Berlin:</strong> Frau Haase und Frau Freliga; <strong>Dresden:</strong> Frau Crell und Frau Runte; <strong>Chemnitz:</strong> Frau Draeger; <strong>Leipzig:</strong> Frau Zilt; <strong>Suhl:</strong> Frau Schneider).</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Selbstausgef&uuml;hrte Tests, au&szlig;erhalb der Arbeitsst&auml;tte, au&szlig;er die von offiziell anerkannten und zertifizierten Teststellen, d&uuml;rfen nicht als Nachweis anerkannt werden.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Jeder Besch&auml;ftigte ist selbst daf&uuml;r verantwortlich, trotz Testung, p&uuml;nktlich an seinem Arbeitsplatz zu erscheinen. Das Testen erfolgt au&szlig;erhalb der Arbeitszeit.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <div style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;">
                                    <li style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Der Impf-, Genesenen- oder Testnachweis muss grunds&auml;tzlich immer mitgef&uuml;hrt werden.</li>
                                </ul>
                            </div>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><span style="color:#1F497D;">&nbsp;</span></p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'>Wir stehen im st&auml;ndigen Austausch mit den Standortleitern. Bei R&uuml;ckfragen bzw. Fragen bez&uuml;glich der Beschulung der Teilnehmer in Pr&auml;senzunterricht, k&ouml;nnen Sie sich gern, wie gewohnt<span style="color:#1F497D;">,</span> an Ihre Standortleitung wenden.</p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style="color:#1F497D;">&nbsp;</span></strong></p>
                            <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;'><strong>Hinweis:</strong> Die aktuell g&uuml;ltigen Richtlinien befinden sich seitens des Gesetzgebers in st&auml;ndiger Anpassung. Wir informieren Sie unverz&uuml;glich dar&uuml;ber, sollte sich eine f&uuml;r Sie relevante &Auml;nderung ergeben.</p>
                            
                            

                           </div>                                 
                          </div>
                          <!-- <div class="col-sm-6">
                           <p></p>
                        </div> -->
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
                        <div class="card card-primary card-outline" style="background-color: #661421;">
                          <div class="card-body">
                            <h5 class="card-title mb-3" style="color:#fff;"><strong>Favoriten Links</strong></h5>
                            <div class="card-text">
                              <div class="list-group">
                                <a href="{{route ('profile')}}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="far fa-user fa-lg"></i><strong> Eigenes Profil bearbeiten</strong></a>
                                <a href="{{ url('/contacts') }}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="far fa-address-book fa-lg"></i><strong> Adressbuch</strong></a>
                                <a href="{{ route('ticket.index') }}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="fas fa-ticket-alt fa-lg"></i><strong> Ticket erstellen</strong>
                                <a href="{{ route('ticket.usertickets') }}" class="list-group-item list-group-item-action list-group-item-primary py-1"><i class="fas fa-clipboard-list fa-lg"></i><strong>     Meine Tickets</strong>
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



@endsection



