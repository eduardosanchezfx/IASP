@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-boxes"></i> Administracion de Productos</h1>
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
        <h3 class="card-title"><i class="fas fa-list-ul"></i> Lista de Productos</h3>
        <div class="card-tools">
            <a href="/Crear_Producto" class="btn btn-tool btn-sm" data-toggle="tooltip" data-placement="top" title="Crear Producto">
                <i class="fas fa-plus-circle"></i>
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Minimizar">
                 <i class="fas fa-minus"></i>
             </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">  
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio por Unidad</th>
            <th>Stock</th>
            <th>Creacion</th>
            <th>Actualizacion</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach($products as $productos)
          <tr class="text-center">
            <td>{{$productos->id}}</td>      
            <td>{{$productos->Nombre}}</td>
            <td>{{$productos->Descripcion}}</td>
            <td>{{$productos->Precio}} {{$productos->tipo_moneda}}</td>
            <td>{{$productos->StockTotal}} {{$productos->unidad}}</td>
            <td>{{$productos->created_at}}</td>
            <td>{{$productos->updated_at}}</td>
            <td>
              <div class="row justify-content-center">
                  @if($productos->deleted_at==null)
                <a href="{{ route('Productos.edit',$productos->id)}}" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Editar {{$productos->Nombre}}"><i class="far fa-edit"></i></a>
                <form method="post" action="{{url('Productos/'.$productos->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar {{$productos->Nombre}}"><i class="fas fa-trash"></i></button>
              </form>
                @endif
                @if($productos->deleted_at!=null)
                <a href="{{ route('Productos.edit', $productos->id) }}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Restaurar a {{$productos->Nombre}}"><i class="fas fa-trash-restore"></i></a>
                <form method="post" action="{{url('Productos/'.$productos->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?, ya que será permanente esta acción')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar a {{$productos->Nombre}} Permanetemente"><i class="fas fa-trash"></i></button>
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
  </div>
@endsection

  