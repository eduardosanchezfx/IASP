@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
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
            <th>Numero</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Actualizacion</th>
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
            <td>{{$almacen->estado}}</td>
            <td>{{$almacen->updated_at}}</td>
            <td>{{$almacen->username}}</td>
            <td>
              <div class="row">
                  
                  @if(($almacen->deleted_at)!=null)
                <a href="{{ route('Almacenes.edit', $almacen->id) }}" class="btn btn-outline-success" >Habilitar</a>
            @endif
            @if($almacen->deleted_at==null)
            <a href="{{ route('Almacenes.edit',$almacen->id)}}" class="btn btn-outline-warning">Editar</a>
            @endif 
                <a href="{{ route('Asignar.create',$almacen->id)}}" class="btn btn-outline-warning">Asignar</a>
                <form method="post" action="{{url('Almacenes/'.$almacen->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class="btn  btn-outline-danger">Eliminar</button>
              </form>
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
  </div>
@endsection

  