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
              <div class="row">
                <a href="{{ route('Productos.edit',$productos->id)}}" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
                <form method="post" action="{{url('Productos/'.$productos->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class="btn  btn-outline-danger"><i class="fas fa-trash"></i></button>
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

  