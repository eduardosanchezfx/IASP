<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark text-center"><i class="fas fa-tachometer-alt"></i> Tablero Principal</h1>
          </div><!-- /.col -->
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fas fa-user-circle"></i> Bienvenido {{auth()->user()->name}}</li>  
            </ol>
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><i class="fas fa-calendar-alt"></i> {{$date}}</li>  
            </ol>
        </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>150</h3>

                <p>Envios en proceso</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-start"></i>
              </div>
              <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>

                <p>Envios aceptados</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a href="#" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>44</h3>

                <p>Envios con falla</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Consultar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @if(auth()->user()->level!='M')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$contador->contadorUsuarios}}</h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="/Lista_Usuarios" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$contador->contadorAlmacenes}}</h3>

                <p>Almacenes </p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse"></i>
              </div>
              <a href="Lista_Almacen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>65</h3>

                <p>Tiendas</p>
              </div>
              <div class="icon">
                <i class="fas fa-store"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>65</h3>

                <p>Aeropuertos</p>
              </div>
              <div class="icon">
                <i class="fas fa-plane-arrival"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @endif
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Almacenes</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>ID Almacen</th>
                    <th>Nombre</th>
                    <th>Destino</th>
                    <th>Empleado destacado</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                    <th>125645</th>
                    <th>Almacen 01</th>
                    <th>Aeropuerto 2</th>
                    <th>Administrador</th>
                    <th>button</th>
                  </tr>
                  <tr>
                    <th>125645</th>
                    <th>Almacen 01</th>
                    <th>Aeropuerto 2</th>
                    <th>Administrador</th>
                    <th>button</th>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Ultimas Ordenes</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Status</th>
                      <th>Destino</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th>1213</th>
                        <th>llaves 123</th>
                        <th>En proceso</th>
                        <th>Aeropuerto</th>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            </div>
          </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
