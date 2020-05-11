@extends('almacenamientos')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-warehouse"></i> Administracion de Almacenes (Productos)</h1>
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
            <th>Estado</th>
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
            <td>{{$almacen->username}}</td>
            <td>
              <div class="row">
                  
                <a href="{{ route('Almacenamientocreate',$almacen->id)}}" class="btn btn-outline-primary">Ver productos</a>
                
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

  