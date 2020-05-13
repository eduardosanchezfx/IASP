@extends('layout.padre')
@section('css')
  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/toastr/toastr.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/icheck-bootstrap/icheck-bootstrap.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/adminlte.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/overlayScrollbars/css/OverlayScrollbars.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
@endsection
 
@section('content')
@include('layout.nav')
@yield('something')
@include('layout.aside') 
@include('layout.footer')
@endsection
  

@section('scripts')
<script src="plugins/jquery/jquery.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.js"></script>
<script src="plugins/select2/js/select2.full.js"></script>
<script src="js/script.js"></script>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<!--manual scripts-->
<script src="js/script.js"></script>
<script>
  $('.select2').select2();
</script>

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 6000,
      progressBar: 1
    });
    @if ($message = Session::get('success'))
        toastr.success('{{$message}}');
        toastr.options.progressBar = true;
    @endif
    @if ($message = Session::get('info'))
        toastr.info('{{$message}}');
        toastr.options.progressBar = true;
    @endif
    @if ($message = Session::get('error'))
        toastr.error('{{$message}}');
        toastr.options.progressBar = true;
    @endif
    @if ($message = Session::get('warning'))
        toastr.warning('{{$message}}');
        toastr.options.progressBar = true;
    @endif
    @if ($errors->any())
        toastr.warning('{{$message}}');
        toastr.options.progressBar = true;
    @endif
    });
    </script>
    <script>
      $('.datepicker').datepicker({
              format: "dd/mm/yyyy",
              language: "es",
              autoclose: true
          });
      </script>
      <script>
    //input a agreagar
    var formulario_usuarios = $("#usuarios-agregar").html();

    $("#add").click(function(){
    // Agregamos el formulario
    $("#alumnos").prepend(formulario_usuarios);

    // Hacemos focus en el primer input del formulario
    $("#alumnos").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
    });
        </script>
        <script>
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        </script>
@endsection


  