@extends('layouts.admin_layout.admin_layout')
@section('content')
@include('tickets.layout_ticket.header',['title'=>'Sonstiges'])

<section class="content">
  <div class="container-fluid col-lg-12">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile form-group">
            <form action="{{route ('form_store')}}" method="post" id="ticket_forms">
            @csrf
            <input type="hidden" name="problem_type" value="problem">
            <!-- child cards -->
            <div class="row mx-auto">
              <!-- Submitter Section layout_ticket submitter.blade.php -->
              @include('tickets.layout_ticket.submitter')
              <!--end Submitter Section -->
              <!-- second card -->
              <div class="col-lg-8">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile form-group">       
                    <div class="row col-md-12">
                      <div class="form-group col-md-6">
                        <label for="searchcomputer"> Betreff</label>
                        <input type="text" name="other" id="other" class="form-control" required autocomplete="false">
                      </div>
                      <div class="form-group col-md-6 col-lg-12">
                        <label for="prob_discription"> Problembeschreibung </label>
                        <textarea type="text" name="prob_discription" class="form-control" rows="15" value="{{ old('prob_discription') ? $request->prob_discription : '' }}" required autocomplete="false"></textarea>
                      </div>
                    </div>                  
                    <div>
                      <button type="submit" class="btn btn-outline-success col-lg-2 float-right">Einreichen</button>
                    </div>
                  </div>
                </div>
              </div><!--end second card -->
            </div>
            </form>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
@endsection





