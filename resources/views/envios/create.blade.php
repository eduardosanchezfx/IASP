@extends('almacenamientos')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-dolly"></i> Envio de Productos</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('/Envio') }}">
                <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
          <div class="col-md-12 ">
                  <div class="card card-outline">
                      <div class="card-header">
                         @foreach($almacens as $al)
                <h5 class="card-title"><i class="fas fa-info-circle"></i> Datos del {{$al->anombre}}</h5>
                @endforeach
        <div class="card-tools">
            <a href="/Crear_Almacen" class="btn btn-tool btn-sm" data-toggle="tooltip" data-placement="top" title="Crear Almacen" >
                <i class="fas fa-plus-circle"></i>
            </a>
            <a id="popover" data-toggle="tooltip" data-placement="left" title="Crear PDF" href="/Almacenpdf" class="btn btn-tool btn-sm">
                <i class="fas fa-file-pdf"></i>
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Minimizar">
                 <i class="fas fa-minus"></i>
             </button>
        </div>
      </div>
              <div class="card-body">
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
                              <input type="text" class="form-control text-center" readonly required value="{{$al->anumero}}"  >
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
                              <input type="text" class="form-control text-center" readonly required value="{{$al->anombre}}">
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
                              <input type="text" class="form-control text-center" readonly required value="{{$al->uname}}" >
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
                              <input type="text" class="form-control text-center" readonly required value="{{$al->aid}}" name="info" >
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
              </div>
          </div></div></div>
              <div class="col-md-12 ">
                  <div class="card card-danger card-outline">
              <div class="card-body">
                  <div class="card-header">
        <h3 class="card-title sm-right"><i class="fas fa-cart-plus"></i> Ingresar Producto</h3>
      </div>
                  <br>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-3 form-group">
                              <label>Numero de Guía</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                </div>
                              <input id="numero_guia" type="text" class="form-control text-center" readonly required value="{{$guia}}" name="numero_guia" >
                              </div>
                              <!-- /.input group -->
                        </div>
                        <div class="col-md-3 form-group">
                              <label>Persona que Realiza Envio</label>
                              <div class="input-group">
                                  <select id="user_id" class="form-control select2 select2-hidden-accessible" name="user_id[]" required disabled data-placeholder="Selecciona un almacen de destino" style="width: 100%;">
                             <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option> 
                            </select>
                              </div>
                              <!-- /.input group -->
                        </div>
                        <div class="col-md-3 form-group">
                              <label>Detalle</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-info"></i></span>
                                </div>
                              <input id="comentario" type="text" class="form-control text-center" name="comentario" >
                              </div>
                              <!-- /.input group -->
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Almacen de destino</label>
                            <select id="almacen_id" class="form-control select2 select2-hidden-accessible" name="almacen_id[]"  data-placeholder="Selecciona un almacen de destino" style="width: 100%;">
                            @foreach($almacenes as $al)
                             <option value="{{$al->id}}">{{$al->numero_almacen}} {{$al->nombre}}</option> 
                            @endforeach
                            </select>
                </div> 
                <div class="col-md-4 form-group">
                            <label>Seleccione un Producto a Enviar</label>
                            <select id="storage_id" class="form-control select2 select2-hidden-accessible" name="storage_id[]"  data-placeholder="Selecciona un producto" style="width: 100%;">
                             @foreach($storage as $st)
                              @if(($st->sdeleted)==null)
                              @if($st->pstock>0)
                              <option value="{{$st->id}}">{{$st->pname}} Stock:{{$st->sstock}} {{$st->punidad}} <span class="badge badge-primary">Precio:{{$st->pprecio}} {{$st->pmoneda}}</span></option> 
                              @endif
                              @if($st->pstock<=0)
                              <option></option>
                              @endif
                              @endif
                              @if($st->sdeleted!=null)
                              <option></option>
                              @endif
                              @endforeach
                            </select>
                </div>  
                <div class="col-md-4 form-group">
                                <label>Ingrese cantidad de productos</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-inbox"></i></span>
                                  </div>
                                <input name="cantidad_inicial[]" id="cantidad_inicial" type="number" class="form-control text-center"  >
                                </div>
                                <!-- /.input group -->
                </div>
                <div class="col-md-3 form-group">
                                <label>Costo al dia de hoy</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                <input name="precio[]" id="precio" type="number" class="form-control text-center"  >
                                </div>
                                <!-- /.input group -->
                </div>
                <div class="col-md-1 form-group">
                    <label>Agregar</label>
                        <div class="input-group">
                            <button onclick="return confirm('¿Deseas Ingresar?')" id="store" class="btn btn-success btn-bg"><i class="fas fa-plus"></i></button>
                        </div>
                </div>
                    </div>
              </div>
              </div>
              </div>
              </div>                 
                     </div>
              </div>
          </div><!--row-->
          </form>
    </section>
<div class="col-md-12">
                  <div class="card card-danger card-outline">
              <div class="card-body">
                  <div class="card-header">
        <h3 class="card-title sm-right"><i class="fas fa-list-ul"></i> Detalle de Envio</h3>
      </div>
                  <br>
                <div class="card-text">
                                <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Numero Guia</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Actualización</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
                    
                </div>
              </div></div></div>
      </div>
      <!-- /.card-body -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
</div> 
<script>$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});</script>
@endsection
