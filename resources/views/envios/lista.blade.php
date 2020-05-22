@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-shipping-fast"></i> Administracion de Envios</h1>
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
        <h3 class="card-title"><i class="fas fa-list-ul"></i> Lista de envios</h3>
        <div class="card-tools">
            @if(auth()->user()->level=='S')
            <a href="/Crear_Almacen" class="btn btn-tool btn-sm" data-toggle="tooltip" data-placement="top" title="Crear Envio" >
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
            <th>Numero de Guía</th>
            <th>Creador</th>
            <th>Remitente</th>
            <th>Estatus</th>
            <th>Destino</th>
            <th>Creación</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach($envios as $env=>$item)
          <tr class="text-center">
            <td class="text-center"><span class="badge badge-pill badge-primary">{{$item->numero_guia}}</span></td>
            <td>{{$item->users->name}}</td>
            <td>{{$item->storages->almacen->nombre}}</td>
            @if($item->estado=='Pendiente')
            <td><span class="badge badge-pill badge-warning">{{$item->estado}}</span></td>
            @endif
            @if($item->estado=='Completado')
            <td><span class="badge badge-pill badge-success">{{$item->estado}}</span></td>
            @endif
            @if($item->estado=='Fallido')
            <td><span class="badge badge-pill badge-danger">{{$item->estado}}</span></td>
            @endif
            <td>{{$item->almacens->nombre}}</td>
            <td>{{$item->created_at}}</td>
            <td>
               botones
            </td>
          </tr> 
          @endforeach
           </tbody>
         
         
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

  