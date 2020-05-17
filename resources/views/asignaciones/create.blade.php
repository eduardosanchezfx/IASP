@extends('asignar')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
              @foreach($almacens as $al)
            <h1 class="m-0 text-dark"><i class="fas fa-users"></i>Asignar Empleados a {{$al->nombre}} </h1>
            @endforeach
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <section class="content">
      <div class="row">
        <div class="col-12">
    <div class=" card card-primary card-outline">
      <div class="card-header">
          @foreach($almacens as $al)
        <h3 class="card-title">Asignar {{$al->nombre}}</h3>
        @endforeach
      </div>
      <!-- /.card-header -->
      <div class="card-body">  
        <div class="container-fluid">
            <form method="POST" action="{{ url('/Asignar') }}">
              @csrf
      <!-- /.card-header -->
      <div class="card-body"> 
          <div class="row">
              <div class="col-md-6 ">
       <div class="col-md-12 form-group">
                              <label>ID de almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->almacenid}}" name="number_id" id="number_id">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
       <div class="col-md-12 form-group">
                              <label>Nombre del almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->nombre}}" name="name" id="name">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
        <div class="col-md-12 form-group">
                              <label>Encargado del almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->username}}" name="number" id="number">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
              
              </div>
              <div class="col-md-6 ">
                  <div class="col-md-12 form-group">
                              <label>Ultima Actualizacion:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->updated_at}}" name="numbe" id="numbe">
                              @endforeach
                              </div>
                              <!-- /.input group -->
                     </div>
                  <div class="col-md-12 form-group">
                        <label>Empleados del almacen:</label>
                        <select class="select2 form-control text-center" multiple="multiple" id="selec2" name="empleados[]"  data-placeholder="Selecciona al menos un empleado" style="width: 100%;">

                          @foreach($m as $um)
                            <option value="{{$um->id}}">{{$um->name}}</option> 
                          @endforeach
                            @foreach($almacenasignacion as $as)
                            <option value="{{$as->uid}}" selected="">{{$as->uname}}</option> 
                            @endforeach


                        </select>
                      </div> 
                  <button class="col-md-12 btn btn-success btn-bg" type="submit">Enviar</button>
              </div>
          </div><!--row-->
                
      </div>
      <!-- /.card-body -->
            </form>
    </div>
    <!-- /.card -->
    </div>
        </div>
      </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
</div>
    
            
  
@endsection