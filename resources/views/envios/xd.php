@if(auth()->user()->level!='M')
                  @if(($item->deleted_at)!=null)
                  <form method="post" action="{{url('Almacenes/'.$item>id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?, Esta accion es permanente')" class="btn  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Permanentemente {{$item->storages->envios->numero_envio}}"><i class="fas fa-trash"></i></button>
              </form>
                <a href="{{ route('Almacenes.edit', $item->id) }}" class="btn btn-outline-success" ><i class="fas fa-trash-restore" data-toggle="tooltip" data-placement="top" title="Restaurar {{$item->storages->envios->numero_envio}}"></i></a>
                @endif
            @if($item->deleted_at==null)
            <form method="post" action="{{url('Almacenes/'.$item->id)}}">
                @csrf
                 {{method_field('DELETE')}}
              <button type="submit" onclick="return confirm('¿Deseas Eliminar?')" class=" btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar {{$item->storages->envios->numero_envio}}"><i class="fas fa-trash"></i></button>
              </form>
            <a href="{{ route('Almacenes.edit',$item->)}}" class=" btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Editar a {{$item->storages->envios->numero_envio}}"><i class="far fa-edit"></i></a>
            <a href="{{ route('Asignarcreate',$env->id)}}" class=" btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Asignar Usuarios a {{$item->storages->envios->numero_envio}}"><i class="fas fa-users"></i></a>
            <a href="{{ route('Almacenamientocreate',$env->id)}}" class=" btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Asignar Productos a {{$item->storages->envios->numero_envio}}"><i class="fas fa-cart-arrow-down"></i></a>
            <a href="{{ route('Lista_Envios',['almacen'=>$env->id])}}" class=" btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Lista Envios"><i class="fas fa-dolly"></i></a>
            @endif 
            @endif
            @if(auth()->user()->level=='M')
            <a href="{{ route('Almacenamientocreate',$env->id)}}" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Asignar Productos a {{$env->numero_envio}}"><i class="fas fa-cart-arrow-down"></i></a>
             @endif