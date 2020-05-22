 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ URL::asset('dist/img/logo.png')}}" alt="partydev" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">Sistema de Inventario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('dist/img/user2-160x160.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info text-center">
        <a class="d-block text-center">{{auth()->user()->name}}</a>
        @if(auth()->user()->level=='S')
        <a class="d-block text-center">Super Administrador</a>
        @endif
        @if(auth()->user()->level=='A')
        <a class="d-block text-center">Administrador</a>
        @endif
        @if(auth()->user()->level=='M')
        <a class="d-block text-center">Empleado</a>
        @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{$contador->contadorProductos}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->level!='M')
              <li class="nav-item">
                <a href="/Crear_Producto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Productos</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="/Lista_producto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Capacidad" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Asignaciones
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="Lista_Almacen" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Almacenes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{$contador->contadorAlmacenes}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Lista_Almacen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrar Almacenes</p>
                </a>
              </li>
              @if(auth()->user()->level!='M')
              <li class="nav-item">
                <a href="Crear_Almacen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Almacenes</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Tiendas
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{$contador->contadorTiendas}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Lista_Tienda" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrar Tiendas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Crear_Tienda" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Tienda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Lista_Almacenamiento" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Almacenamiento</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plane"></i>
              <p>
                Aeropuertos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{$contador->contadorAeropuertos}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Lista_Aeropuerto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrar Aeropuertos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Crear_Aeropuerto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Aeropuertos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Almacenamiento</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Envios
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">{{$contador->contadorEnvios}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Envio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Envios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Envios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{$contador->contadorUsuarios}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->level!='M')
              <li class="nav-item">
                <a href="/Lista_Usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrar Usuarios</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/Crear_Usuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Usuarios</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="/Perfil" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Perfil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">HERRAMIENTAS</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-diagnoses"></i>
              <p>
                Estadisticas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Reportes 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/FrecuencyQuestions" class="nav-link">
              <i class="nav-icon fas fa-bug"></i>
              <p>
                Soporte tecnico
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Sala
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
