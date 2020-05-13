@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Producto</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <form action="{{ route('Productos.update',$productos) }}" method="POST">
            @csrf
            @method('PUT')
              <!-- Timelime example  -->
              <div class="row">
                <div class="col-md-12">
                  <!-- The time line -->
                  <div class="timeline">
                   <!-- timeline time label -->
                   @foreach ($p as $item)
                   <div class="time-label">
                    <span class="bg-info">Formulario</span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-users-cog bg-red"></i>
                    <div class="timeline-item">
                      <span class="time"> Paso 1 de 3</span>
                      <h3 class="timeline-header"><a class="text-red" href="#">Informacion principal</a></h3>
      
                      <div class="timeline-body">
                        <div class="row">
                            <div class="col-md-3 form-group">
                              <label>Nombre del producto:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                </div>
                              <input type="text" class="form-control" required value="{{$item->Nombre}}" name="nombre_producto" id="nombre_producto">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form-group -->
                            <div class="col-md-3 form-group">
                              <label>Descripcion breve:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                              <input type="text" class="form-control" required value="{{$item->Descripcion}}" name="descripcion" id="descripcion">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form-group -->
                            <div class="col-md-3 form-group">
                              <label>Stock Inicial:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                              <input type="number" class="form-control" value="{{$item->StockTotal}}" readonly name="stockinit">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form-group -->
                            <!-- /.form-group -->
                            <div class="col-md-3 form-group">
                              <label>Agregar:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                              <input type="number" class="form-control" required  name="StockTotal" id="StockTotal">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form-group -->
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div id="e1">
                    <i class="fas fa-user-shield bg-warning"></i>
                    <div class="timeline-item">
                      <span class="time"><i class=""></i> Paso 2 de 3</span>
                      <h3 class="timeline-header no-border"><a class="text-warning" href="#">Adicional</a></h3>
                      <div class="timeline-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                              <label>Precio:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                              <input type="passsword" class="form-control" required value="{{$item->Precio}}" name="precio" id="precio">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <div class="col-md-6 form-group">
                              <label>Unidad de medida</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <select class="custom-select" name="unidad" id="unidad">
                                <option value="{{$item->unidad}}" selected>Selecciono: {{$item->unidad}}</option>
                                  <option value="PZ">Pieza</option>
                                  <option value="M">Metro</option>
                                  <option value="CM">Centimetro</option>
                                  <option value="KM">Kilogramo</option>
                                  <option value="TN">Tonelada</option>
                                  <option value="M2">Metro Cuadrado</option>
                                  <option value="M3">Metro Cubico</option>
                                </select>
                              </div>
                              <!-- /.input group -->
                            </div>
                            </div>
                            @endforeach
                      </div>
                      <div class="timeline-footer">
                        <button class="btn btn-primary btn-sm" type="submit">Enviar</button>
                      </div>
                    </div>
                    
                  </div>
                  <!-- END timeline item -->
                  
                <!-- /.col -->
                  </form>
              </div>
            </div>
            <!-- /.timeline -->
    </section>
</div>
  
@endsection