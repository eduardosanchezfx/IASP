<div class="col-md-6 form-group">
    <label>Usuario a Cargo</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-key"></i></span>
      </div>
      <select class="custom-select" name="usuario_admin" id="usuario_admin">
        @foreach($usuarios as $usr)
      <option value="{{$usr->id}}">{{$usr->name}}</option>
        @endforeach
      </select>
    </div>
    <!-- /.input group -->
  </div>

    <div class="col-md-6 form-group">
      <label>Empleados del almacen</label>
      <select class="select2 form-control" multiple="multiple" id="selec2" name="empleados[]"  data-placeholder="Selecciona un empleado" style="width: 100%;">
        @foreach ($usuariosm as $usr)
        <option value="{{$usr->id}}">{{$usr->name}}</option> 
        @endforeach

      </select>
    </div>
    <!-- /.form-group -->