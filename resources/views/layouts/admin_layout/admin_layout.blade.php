<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MIQR | SMT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ url ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Dropzone -->
  <link rel="stylesheet" href="{{ url('dropzone-5.7.0/dist/min/dropzone.min.css') }}" />
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url ('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Select 2 Bootstrap Theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('css/admin_css/adminlte.min.css') }}">
  <!-- app.css -->
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url ('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url ('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Datatables Css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.dataTables.min.css">
  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <link rel="stylesheet" href="http://demo.hackandphp.com/address-book-with-bootstrap-and-jquery/css/animatecss/animate.min.css">
  <link rel="stylesheet" href="http://demo.hackandphp.com/address-book-with-bootstrap-and-jquery/js/slidernav/slidernav.css">

  <style>

.tooltip-inner {
    background-color: #681a24 !important;
    }
    .tooltip.bs-tooltip-right .arrow:before {
        border-right-color: #681a24 !important;
    }
    .tooltip.bs-tooltip-left .arrow:before {
        border-left-color: #681a24 !important;
    }
    .tooltip.bs-tooltip-bottom .arrow:before {
        border-bottom-color: #681a24 !important;
    }
    .tooltip.bs-tooltip-top .arrow:before {
        border-top-color: #681a24 !important;
    }
    /* swal */
    .swal2-container {
        z-index: X;
      }
      /* right bounce */
    @-webkit-keyframes bounceRight {
      0%,
      20%,
      50%,
      80%,
      100% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
      }
      40% {
        -webkit-transform: translateX(-30px);
        transform: translateX(-30px);
      }
      60% {
        -webkit-transform: translateX(-15px);
        transform: translateX(-15px);
      }
    }
    @-moz-keyframes bounceRight {
      0%,
      20%,
      50%,
      80%,
      100% {
        transform: translateX(0);
      }
      40% {
        transform: translateX(-30px);
      }
      60% {
        transform: translateX(-15px);
      }
    }
    @keyframes bounceRight {
      0%,
      20%,
      50%,
      80%,
      100% {
        -ms-transform: translateX(0);
        transform: translateX(0);
      }
      40% {
        -ms-transform: translateX(-30px);
        transform: translateX(-30px);
      }
      60% {
        -ms-transform: translateX(-15px);
        transform: translateX(-15px);
      }
    }
    /* /right bounce */


    /* assign bounce */
    .fa-arrow-right {
      -webkit-animation: bounceRight 2s infinite;
      animation: bounceRight 2s infinite;
      float:right;
    }

    .fa-arrow-left {
      -webkit-animation: bounceLeft 2s infinite;
      animation: bounceLeft 2s infinite;
    }

    .fa-chevron-down {
      -moz-animation: bounceDown 2s infinite;
      -webkit-animation: bounceDown 2s infinite;
      animation: bounceDown 2s infinite;
      text-align:center;
      display:block;
    }

    .img-circle{
    border:0px solid;
    border-radius:50%;
    width:200px;
    height:200px;
    }

    .img-size-small {
      width: 33.9px !important;
      height: 33.9px !important;
    }
    /* .os-content {
      background-color: #681A25!important;
    } */
    .main-sidebar {
      background-color: #681A25 !important;
    }
    .card-primary.card-outline {
      border-top: 3px solid #681A25 !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.admin_layout.admin_header')

@include('layouts.admin_layout.admin_sidebar')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    @yield('content')

</div>

@include('layouts.admin_layout.admin_footer')
<!-- jQuery -->
<script src="{{ url ('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url ('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url ('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url ('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<!--Scripts for JQMap are deleted -->
<!-- jQuery Knob Chart -->
<script src="{{ url ('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url ('plugins/moment/moment.min.js') }}"></script>
<script src="{{ url ('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url ('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url ('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url ('js/admin_js/adminlte.js') }}"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url ('js/admin_js/pages/dashboard.js') }}"></script>
<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if(Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }

</script>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <script>
       //$('#add').modal('show');
        toastr.error("{{ $error }}");
        toastr.options = {
          "preventDuplicates": true
        }
    </script>
    @endforeach
@endif


<!-- Datatables script-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>


<script>
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<!--DropZone-->
<script src="{{ url('dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Custom JS -->
<script src="{{ url('js/admin_js/script.js') }}"></script>
@yield('script')
</body>
</html>
