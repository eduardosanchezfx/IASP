@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-plus-square"></i> Crear Producto</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('/Productos') }}">
              @csrf
              <!-- Timelime example  -->
              <div class="row">
                <div class="col-md-12">
                  <!-- The time line -->
                  <div class="timeline">
                    <!-- timeline time label -->
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
                              <div class="col-md-6 form-group ">
                                <label class="text-center">Nombre del producto:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-parachute-box"></i></span>
                                  </div>
                                  <input type="text" class="form-control" required placeholder="Cajas 20X20" name="nombre_producto" id="nombre_producto">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form-group -->
                              <div class="col-md-6 form-group">
                                <label class="text-center">Descripcion breve:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sticky-note" aria-hidden="true"></i></span>
                                  </div>
                                  <input type="text" class="form-control" required placeholder="Caja negra con tapas a los costados" name="descripcion" id="descripcion">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form-group -->
                              <div class="col-md-6 form-group">
                                <label class="text-center">Stock:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                                  </div>
                                  <input type="number" class="form-control" required placeholder="1500" name="StockTotal" id="StockTotal">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form-group -->
                              
                              <div class="col-md-6 form-group">
                                <label class="text-center">Unidad de medida:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-ruler-horizontal"></i></span>
                                  </div>
                                  <select class="custom-select" name="unidad" id="unidad">
                                    <option value="PZ" selected>Pieza</option>
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
                                  <label class="text-center">Precio unitario:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                  </div>
                                  <input type="passsword" class="form-control" required placeholder="150.30" name="precio" id="precio">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <div class="col-md-6 form-group">
                                <label class="text-center">Divisa:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                                  </div>
                                  <select class="custom-select" name="divisa" id="divisa">
                                    <option value="EUR">Euro</option>
                                    <option value="DUS" selected>Dolar Estado Unidense</option>
                                    <option value="NMX">Peso Mexicano</option>
                                    <option value="YEN">Yen (Japon)</option>
                                    <option value="DCA">Dolar Canadiense</option>
                                    <option value="LIE">Libra Esterlina</option>
                                    <option value="YUA">YUAN (China)</option>
                                  </select>
                                </div>
                                <!-- /.input group -->
                              </div>

                              
                              </div>
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