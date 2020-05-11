
      <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    @if ($message = Session::get('success'))
    $('.toastrDefaultSuccess').click(function() {
        toastr.success('{{$message}}')
      });
    @endif
    @if ($message = Session::get('info'))
    $('.toastrDefaultInfo').click(function() {
        toastr.info('{{$message}}')
      });
    @endif
    @if ($message = Session::get('error'))
    $('.toastrDefaultError').click(function() {
        toastr.error('{{$message}}')
      });
    @endif
    @if ($message = Session::get('warning'))
    $('.toastrDefaultWarning').click(function() {
        toastr.warning('{{$message}}')
      });
    @endif
    @if ($errors->any())
    $('.toastrDefaultWarning').click(function() {
        toastr.warning('{{$message}}')
      });
    @endif
    });
    </script>