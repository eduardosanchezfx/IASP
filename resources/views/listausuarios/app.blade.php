<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0 text-dark"><i class="fas fa-user-cog"></i> Administracion de Usuarios</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <div class="row">
        <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title sm-right"><i class="fas fa-list-ul"></i> Usuarios</h3>
        <div class="card-tools">
            <a id="popover" data-toggle="tooltip" data-placement="left" title="Agregar Usuarios" href="/Crear_Usuario" class="btn btn-tool btn-sm">
                <i class="fas fa-user-plus"></i>
            </a>
             <a id="popover" data-toggle="tooltip" data-placement="left" title="Crear PDF" href="/pdf" class="btn btn-tool btn-sm">
                <i class="fas fa-file-pdf"></i>
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
            <th>Correo</th>
            <th>Tipo de Usuario</th>
            <th>Ultima Actualizacion</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach($user as $usuarios)
          <tr>
            @if(($usuarios->deleted_at)!=null)
            <td class="text-center"><span class="badge badge-pill badge-danger"><i class="fas fa-user-times"></i> {{$usuarios->id}}</span></td>
            @endif
            @if($usuarios->deleted_at==null)
            <td class="text-center"><span class="badge badge-pill badge-success"><i class="fas fa-user-check"></i> {{$usuarios->id}}</span></td>
            @endif    
            <td>{{$usuarios->name}}</td>
            <td>{{$usuarios->email}}</td>
            @if($usuarios->level=='S')
            <td class="text-center"><span class="badge badge-pill badge-primary">Super Administrador</span></td>
            @endif
            @if($usuarios->level=='A')
            <td class="text-center"><span class="badge badge-pill badge-secondary">Administrador</span></td>
            @endif
            @if($usuarios->level=='M')
            <td class="text-center"><span class="badge badge-pill badge-info">Empleado</span></td>
            @endif
            <td>{{$usuarios->updated_at}}</td>

            
            <td>
              <div class="row justify-content-center">
                @if(($usuarios->deleted_at)!=null)
                <a href="{{ route('Lista_Usuarios.edit', $usuarios->id) }}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Restaurar a {{$usuarios->name}}"><i class="fas fa-trash-restore"></i></a>
                <form method="post" action="{{url('Lista_Usuarios/'.$usuarios->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?, ya que será permanente esta acción')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar a {{$usuarios->name}} Permanetemente"><i class="fas fa-trash"></i></button>
            @endif
            @if($usuarios->deleted_at==null)
            <a href="{{ route('Lista_Usuarios.edit',$usuarios->id)}}" id="editar" class="btn btn-outline-warning editar" data-toggle="tooltip" data-placement="top" title="Editar a {{$usuarios->name}}"><i class="fas fa-user-edit"></i></a>
            <form method="post" action="{{url('Lista_Usuarios/'.$usuarios->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar a {{$usuarios->name}}"><i class="fas fa-trash"></i></button>
            @endif 
                
                
                
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
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

  
  