@extends('layout.padre')
@section('css')
    <!-- jsGrid -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/jsgrid/jsgrid.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/jsgrid/jsgrid-theme.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
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
<script src="{{ URL::asset('plugins/jquery/jquery.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('plugins/jquery-ui/jquery-ui.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('plugins/chart.js/Chart.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('plugins/jqvmap/jquery.vmap.js')}}"></script>
<script src="{{ URL::asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('plugins/jquery-knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js')}}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('plugins/summernote/summernote-bs4.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ URL::asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ URL::asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- jQuery -->
<script src="{{ URL::asset('plugins/jquery/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<!-- jsGrid -->
<script src="{{ URL::asset('plugins/jsgrid/demos/db.js')}}"></script>
<script src="{{ URL::asset('plugins/jsgrid/jsgrid.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
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
    <script type="text/javascript">
      $(document).ready(function(){
         $("a.editar").click(function() {
            url = $(this).attr("href");
            window.open(url, '_blank','width=400,height=400,resizable=false');
            return false;
         });
      });
      </script>
      <script>
          $(document).on('click', '#app', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
          </script>
@endsection


  