@extends('almacenamientos')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-people-carry"></i> Asignar Productos A Almacen</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('/Almacenamiento') }}">
              @csrf
          <div class="col-md-12 ">
                  <div class="card card-outline">
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-info-circle"></i> Datos del Almacen</h5>
                <br>
                <hr>

                <div class="card-text">
          <div class="col-md-12 ">
          <div class="row">
       <div class="col-md-3 form-group">
                              <label>Numero de almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->anumero}}" name="number" id="number_id">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
       <div class="col-md-3 form-group">
                              <label>Nombre del almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-outdent" aria-hidden="true"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->anombre}}" name="name" id="name">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
        <div class="col-md-3 form-group">
                              <label>Encargado del almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->uname}}" name="number" id="number">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
        <div class="col-md-3 form-group">
                              <label>ID del almacen:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                </div>
                                  @foreach($almacens as $al)
                              <input type="text" class="form-control text-center" readonly required value="{{$al->aid}}" name="number_id" id="number">
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
              </div>
          </div></div></div>
              <div class="col-md-12 ">
                  <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-cart-plus"></i> Ingresar Producto</h5>
                <br>
                <hr>

                <div class="card-text">
                    <div class="row">
                <div class="col-md-4 form-group">
                            <label>Seleccione un Producto</label>
                            <select class="form-control select2 select2-hidden-accessible" name="productos[]"  data-placeholder="Selecciona un producto" style="width: 100%;">
                              @foreach ($products as $productos)
                              <option value="{{$productos->id}}">{{$productos->Nombre}}</option> 
                              @endforeach
                            </select>
                </div>  
                <div class="col-md-4 form-group">
                                <label>Ingrese cantidad de Ingreso</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-inbox"></i></span>
                                  </div>
                                <input type="number" step="0.01" class="form-control text-center" required value="Cantidad" name="name" id="name">
                                </div>
                                <!-- /.input group -->
                </div>
                 <div class="col-md-3 form-group">
                                <label>Precio de Venta(Puede variar)</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                <input type="number" step="0.01" class="form-control text-center" required value="Cantidad" name="name" id="name">
                                </div>
                                <!-- /.input group -->
                </div>
                <div class="col-md-1 form-group">
                    <br>
                        <div class="input-group">
                        <button class="btn btn-success btn-bg"><i class="fas fa-plus"></i></button>
                        </div>
                </div>
                    </div>
              </div>
              </div>
              </div>
              </div>                 
                     </div>
                  <button class="btn btn-primary btn-bg" type="submit">Enviar</button>
              </div>
          </div><!--row-->
                
      </div>
      <!-- /.card-body -->
            </form>
    </div>
    <!-- /.card -->
    </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
</div>
  
@endsection