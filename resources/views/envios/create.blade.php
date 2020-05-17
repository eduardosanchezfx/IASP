@extends('almacenamientos')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
              @foreach($almacens as $al)
            <h1 class="m-0 text-dark"><i class="fas fa-people-carry"></i> Asignar Productos a {{$al->anombre}}</h1>
            @endforeach
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ url('/Almacenamiento') }}">
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
                              <input id="almacen_id" type="text" class="form-control text-center" readonly required value="{{$al->aid}}" name="almacen_id" >
                              @endforeach
                              </div>
                              <!-- /.input group -->
       </div>
              </div>
          </div></div></div>
              <div class="col-md-12 ">
                  <div class="card card-primary card-outline">
              <div class="card-body">
                  <div class="card-header">
        <h3 class="card-title sm-right"><i class="fas fa-cart-plus"></i> Ingresar Producto</h3>
      </div>
                  <br>
                <div class="card-text">
                    <div class="row">
                <div class="col-md-6 form-group">
                            <label>Seleccione un Producto</label>
                            <select id="product_id" class="form-control select2 select2-hidden-accessible" name="product_id[]"  data-placeholder="Selecciona un producto" style="width: 100%;">
                              @foreach ($products as $productos)
                              @if($productos->deleted_at==null)
                              @if($productos->StockTotal>0)
                              <option value="{{$productos->id}}">{{$productos->Nombre}} Stock:{{$productos->StockTotal}}{{$productos->unidad}}</option> 
                              @endif
                              @if($productos->StockTotal<=0)
                              <option></option>
                              @endif
                              @endif
                              @if($productos->deleted_at!=null)
                              <option></option>
                              @endif
                              @endforeach
                            </select>
                </div>  
                <div class="col-md-5 form-group">
                                <label>Ingrese cantidad de Ingreso</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-inbox"></i></span>
                                  </div>
                                <input name="stock[]" id="stock" type="number" class="form-control text-center"  >
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
                  <div class="card card-primary card-outline">
              <div class="card-body">
                  <div class="card-header">
        <h3 class="card-title sm-right"><i class="fas fa-list-ul"></i> Datos Almacenados</h3>
      </div>
                  <br>
                <div class="card-text">
                                <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>ID Ingreso</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Creación</th>
            <th>Actualización</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
              @foreach($storage as $st)
              <tr class="text-center">
                  @if(($st->sdeleted)!=null)
                  <td><span class="badge badge-pill badge-danger">{{$st->id}}</span></td>
              @endif
              @if(($st->sdeleted)==null)
              <td><span class="badge badge-pill badge-success">{{$st->id}}</span></td>
              @endif
              <td>{{$st->pname}}</td>
              <td>{{$st->sstock}} {{$st->punidad}}</td>
              <td>{{$st->pprecio}} {{$st->pmoneda}}</td>
              <td>{{$st->screated}}</td>
              <td>{{$st->supdated}}</td>
              <td>
              <div class="row justify-content-center">
                  @if(($st->sdeleted)!=null)
                  <a href="{{ route('Almacenamiento.edit', $st->id) }}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Restaurar producto {{$st->pname}}"><i class="fas fa-trash-restore"></i></a>
                  <form method="post" action="{{url('Almacenamiento/'.$st->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar Permanetemente?')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar producto {{$st->pname}} permanetemente"><i class="fas fa-trash"></i></button>  
                  </form>
              @endif
              @if(($st->sdeleted)==null)
              <a href="{{ route('Almacenamiento.edit',$st->id)}}" id="editar" class="btn btn-outline-warning editar" data-toggle="tooltip" data-placement="top" title="Editar a {{$st->pname}}"><i class="far fa-edit"></i></a>
              <form method="post" action="{{url('Almacenamiento/'.$st->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas deshabilitar?, puede aun restaurarlo')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Deshabilitar producto {{$st->pname}} "><i class="fas fa-trash"></i></button>  
              </form>
              @endif    
              </div>
              </td>
          </tr>
          @endforeach
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
