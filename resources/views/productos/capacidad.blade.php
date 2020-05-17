@extends('producto')

@section('something')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-boxes"></i> Productos Asignados</h1>
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
            <th>Asignados (%)</th>
            <th>Asignados</th>
            <th>Sin Asignar</th>
            <th>Actualizacion</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach($products as $productos)
          <tr class="text-center">
            @if(($productos->deleted_at)!=null)
              <td class="text-center"><span class="badge badge-pill badge-danger">{{$productos->id}}</span></td>      
            @endif
            @if(($productos->deleted_at)==null)
            <td class="text-center"><span class="badge badge-pill badge-success">{{$productos->id}}</span></td>
            @endif        
            <td>{{$productos->Nombre}}</td>
            <td class="justify-content-center"><div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{100-(($productos->StockTotal)*100/($productos->StockInicial))}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div> {{100-(($productos->StockTotal)*100/($productos->StockInicial))}}%</td>
            <td>{{($productos->StockInicial)-($productos->StockTotal)}} {{$productos->unidad}}</td>
            <td>{{$productos->StockTotal}} {{$productos->unidad}}</td>
            <td>{{$productos->updated_at}}</td>
            <td>
              <div class="row justify-content-center">
                  @if(auth()->user()->level!='M')
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
                @endif
                @if(auth()->user()->level=='M')
                <span class="badge badge-info">Solo lectura</span>
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

  