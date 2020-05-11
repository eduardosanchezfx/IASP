@extends('layout.padre')
@section('css')

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
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

<script>
  var table = $('#example1').DataTable({
     'paging'      : true,
     'lengthChange': true,
     'searching'   : true,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : true,
     'buttons': [
       'copy', 'print', 'excel', 'pdf'
   ],
     language: {
       "decimal": "",
       "emptyTable": "Sin Información!!!",
       "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
       "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
       "infoFiltered": "(Filtrado de _MAX_ total entradas)",
       "infoPostFix": "",
       "thousands": ",",
       "lengthMenu": "Mostrar _MENU_ Entradas",
       "loadingRecords": "Cargando...",
       "processing": "Procesando...",
       "search": "Buscar:",
       "zeroRecords": "Sin resultados encontrados",
       "paginate": {
           "first": "Primero",
           "last": "Ultimo",
           "next": "Siguiente",
           "previous": "Anterior"
       }
      }
      
   });
   table.buttons().container()
   .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
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
          function continuar(id){
          if (document.getElementById){ //se obtiene el id
          var e2 = document.getElementById(id); //se define la variable "el" igual a nuestro div
          e2.style.display = (e2.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
          }
              }
              /*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
          window.onload=continuar('e1');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
              
          function continuar2(id){
          if (document.getElementById){ //se obtiene el id
          var e4 = document.getElementById(id); //se define la variable "el" igual a nuestro div
          e4.style.display = (e4.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
          }
              }
          continuar2('e3')=window.onload();
          /*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
          /* "contenido_a_mostrar" es el nombre que le dimos al DIV */
      </script>
@endsection


  