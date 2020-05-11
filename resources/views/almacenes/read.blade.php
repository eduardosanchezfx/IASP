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
      </div>
      <!-- /.card-header -->
      <div class="card-body">  
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
            @foreach($almacenes as $almacen)
          <tr class="text-center">
            <td>{{$almacen->id}}</td>      
            <td>{{$almacen->numero_almacen}}</td>
            <td>{{$almacen->nombre}}</td>
            <td>{{$almacen->direccion}}</td>
            <td>{{$almacen->username}}</td>
            <td>
              <div class="row text-center"> 
                  @if(auth()->user()->level!='M')
                  @if(($almacen->deleted_at)!=null)
                  <form method="post" action="{{url('Almacenes/'.$almacen->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?, Esta accion es permanente')" class="btn  btn-outline-danger"><i class="fas fa-trash"></i></button>
              </form>
                <a href="{{ route('Almacenes.edit', $almacen->id) }}" class="btn btn-outline-success" ><i class="fas fa-trash-restore"></i></a>
                @endif
            @if($almacen->deleted_at==null)
            <form method="post" action="{{url('Almacenes/'.$almacen->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class=" btn btn-outline-danger"><i class="fas fa-trash"></i></button>
              </form>
            <a href="{{ route('Almacenes.edit',$almacen->id)}}" class=" btn btn-outline-warning"><i class="far fa-edit"></i></a>
            <a href="{{ route('Asignarcreate',$almacen->id)}}" class=" btn btn-outline-primary"><i class="fas fa-users"></i></a>
            <a href="{{ route('Almacenamientocreate',$almacen->id)}}" class=" btn btn-outline-info"><i class="fas fa-cart-arrow-down"></i></a>
            @endif 
            @endif
            @if(auth()->user()->level=='M')
            <a href="{{ route('Almacenamientocreate',$almacen->id)}}" class="btn btn-outline-info"><i class="fas fa-cart-arrow-down"></i></a>
             @endif   
                  
              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
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

  