@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <!-- <h1 class="m-0 text-dark">H1 Header</h1> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            Erfassung
          </button>
        </div><!-- /.col -->

        <!-- modal -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 1080px!important;"  role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Formular Erfassung</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form>
                    <!-- First row -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inventNumber" placeholder="Inventarnummer" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            	<input type="date" class="form-control" id="date" placeholder="Anschffungsdatum">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="price" placeholder="Kaufpreis">
                        </div>
                    </div>
                    <!-- End of First row-->
                    <!-- Second row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Standort</option>
                                <option>Trachenberg 93</option>
                                <option>Barbarossa 2</option>
                                <option>Park 28</option>
                                <option>Löscher 16</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Raum</option>
                                <option>1.01</option>
                                <option>1.02</option>
                                <option>1.03</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Hochladen</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile03">
                                    <label class="custom-file-label" for="inputGroupFile03">Rechnung</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Second row-->
                    <!-- Third row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected>Geräteart</option>
                                <option>Rechner</option>
                                <option>Laptop</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            	<input type="text" class="form-control" id="text" placeholder="Gerätetyp">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="price" placeholder="Gerätename">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="price" placeholder="Seriennummer">
                        </div>
                    </div>
                    <!-- End of Third row-->
                    <!-- Forth row -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="notes" rows="3" placeholder="Notizen"></textarea>
                        </div>
                    </div>
                    <!-- End of Forth row -->
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                  <button type="button" class="btn btn-primary">Einfügen</button>
                </div>
              </div>
            </div>
          </div>

          <!--End Add Modal-->


        <div class="col-sm-6">
        <div class="breadcrumb float-sm-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#print">Inventarnummer Drucken</button>
        </div>
        <!-- modal Print -->
        <div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Formular Druck Inventarnummern</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Standort</option>
                                <option>Trachenberg 93</option>
                                <option>Barbarossa 2</option>
                                <option>Park 28</option>
                                <option>Löscher 16</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inventNumber" placeholder="Inventarnummer" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="anzahl" placeholder="Anzahl">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">verwerfen</button>
                  <button type="button" class="btn btn-primary">Drucken</button>
                </div>
              </div>
            </div>
          </div>
        <!--End modal Print -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="col-lg-12 mt-2">
                <form>
                    <!-- First row -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3 mt-0">
                            <input class="form-control" type="text" placeholder="Suchen" aria-label="Search">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inventNumber" placeholder="Inventarnummer" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            	<input type="date" class="form-control" id="date" placeholder="Anschffungsdatum">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="price" placeholder="Kaufpreis">
                        </div>
                    </div>
                    <!-- End of First row-->
                    <!-- Second row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Standort</option>
                                <option>Trachenberg 93</option>
                                <option>Barbarossa 2</option>
                                <option>Park 28</option>
                                <option>Löscher 16</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Raum</option>
                                <option>1.01</option>
                                <option>1.02</option>
                                <option>1.03</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <div >
                                <img src="{{ url('images/admin_images/rechnung.png') }}" alt="rechnung.png" class="rounded">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-danger">Ausmustern</button>
                        </div>
                    </div>
                    <!-- End of Second row-->
                    <!-- Third row-->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected>Geräteart</option>
                                <option>Rechner</option>
                                <option>Laptop</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            	<input type="text" class="form-control" id="text" placeholder="Gerätetyp">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="price" placeholder="Gerätename">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="price" placeholder="Seriennummer">
                        </div>
                    </div>
                    <!-- End of Third row-->
                    <!-- Forth row -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="notes" rows="3" placeholder="Notizen"></textarea>
                        </div>
                    </div>
                    <!-- End of Forth row -->
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">verwerfen</button>
                  <button type="button" class="btn btn-primary">Speichern</button>
                </div>
              </div>

        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
