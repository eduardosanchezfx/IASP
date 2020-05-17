@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-warehouse"></i> Administracion de Almacenes</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="row">
        <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-list-ul"></i> Lista de Almacenes</h3>
        <div class="card-tools">
            @if(auth()->user()->level=='S')
            <a href="/Crear_Almacen" class="btn btn-tool btn-sm" data-toggle="tooltip" data-placement="top" title="Crear Almacen" >
                <i class="fas fa-plus-circle"></i>
            </a>
            @endif
            <a id="popover" data-toggle="tooltip" data-placement="left" title="Crear PDF" href="/Almacenpdf" class="btn btn-tool btn-sm">
                <i class="fas fa-file-pdf"></i>
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Minimizar">
                 <i class="fas fa-minus"></i>
             </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">  
          <div class="justify-content-center">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr class="text-center">
            <th>ID</th>
            <th>Numero de Almacen</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Encargado</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
              @if($almacenes!=null)
            @foreach($almacenes as $almacen)
          <tr class="text-center">
            @if(($almacen->deleted_at)!=null)
              <td class="text-center"><span class="badge badge-pill badge-danger">{{$almacen->id}}</span></td>      
            @endif
            @if(($almacen->deleted_at)==null)
            <td class="text-center"><span class="badge badge-pill badge-success">{{$almacen->id}}</span></td>
            @endif    
            <td>{{$almacen->numero_almacen}}</td>
            <td>{{$almacen->nombre}}</td>
            <td>{{$almacen->direccion}}</td>
            <td>{{$almacen->username}}</td>
            <td>
              <div class="row text-center justify-content-center"> 
                  @if(auth()->user()->level!='M')
                  @if(($almacen->deleted_at)!=null)
                  <form method="post" action="{{url('Almacenes/'.$almacen->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?, Esta accion es permanente')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Permanentemente {{$almacen->nombre}}"><i class="fas fa-trash"></i></button>
              </form>
                <a href="{{ route('Almacenes.edit', $almacen->id) }}" class="btn btn-outline-success" ><i class="fas fa-trash-restore" data-toggle="tooltip" data-placement="top" title="Restaurar {{$almacen->nombre}}"></i></a>
                @endif
            @if($almacen->deleted_at==null)
            <form method="post" action="{{url('Almacenes/'.$almacen->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class=" btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar {{$almacen->nombre}}"><i class="fas fa-trash"></i></button>
              </form>
            <a href="{{ route('Almacenes.edit',$almacen->id)}}" class=" btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Editar a {{$almacen->nombre}}"><i class="far fa-edit"></i></a>
            <a href="{{ route('Asignarcreate',$almacen->id)}}" class=" btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Asignar Usuarios a {{$almacen->nombre}}"><i class="fas fa-users"></i></a>
            <a href="{{ route('Almacenamientocreate',$almacen->id)}}" class=" btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Asignar Productos a {{$almacen->nombre}}"><i class="fas fa-cart-arrow-down"></i></a>
            @endif 
            @endif
            @if(auth()->user()->level=='M')
            <a href="{{ route('Almacenamientocreate',$almacen->id)}}" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Asignar Productos a {{$almacen->nombre}}"><i class="fas fa-cart-arrow-down"></i></a>
             @endif   
                  
              </div>
            </td>
          </tr>
           </tbody>
          @endforeach
          @endif
          @if($almacenes==null)
          <tbody></tbody>
          @endif
         
        </table>
          </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
      </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
@endsection

  